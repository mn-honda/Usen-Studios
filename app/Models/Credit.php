<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Card;
// use Stripe\Cashier;
use Laravel\Cashier\Cashier;
use Stripe\Exception\CardException;
use Stripe\Issuing\Card as IssuingCard;
use Stripe\StripeClient;
use Symfony\Component\VarDumper\VarDumper;

class Credit extends Model
{
    use HasFactory;

    protected $casts = [
        'card_number' => 'encrypted',
        'security_code' => 'encrypted',
        'name' => 'encrypted',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public static function setCustomer($token, $user) {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        try {
            $customer = Customer::create([
                'card' => $token,
                'name' => $user->name,
                'description' => $user->id,
            ]);
        } catch(CardException $e) {
            return false;
        }
        // $target_customer = null;
        if ( isset($customer->id) ) {
            $target_customer = $user;
            $target_customer->stripe_id = $customer->id;
            // $target_customer->update();
            $target_customer->save();
            return true;
        }
        return false;
    }

    public static function updateCustomer($token, $user) {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        try {
            $customer = Customer::retrieve($user->stripe_id);
            $card = $customer->createSource($user->stripe_id, ['source' => $token ]);
            if ( isset($customer) ) {
                $customer->default_source = $card['id'];
                $customer->save();
                // $customer->update();
                return true;
            }
        } catch(CardException $e) {
            echo("情報の更新でエラーが発生");
            return false;
        }
        return true;
    }

    protected static function getDefaultCard($user) {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $default_card = null;
        if ( is_null($user->stripe_id) ) {
            return $default_card;
        }
        $customer = Customer::retrieve($user->stripe_id);
        if ( isset($customer['default_source']) && $customer['default_source'] ) {
            $card = Customer::retrieveSource($user->stripe_id, $customer->default_source);
            $default_card = [
                'number' => str_repeat('*', 8) . $card->last4,
                'brand' => $card->brand,
                'exp_month' => $card->exp_month,
                'exp_year' => $card->exp_year,
                'name' => $card->name,
                'id' => $card->id,
            ];
        }
        return $default_card;
    }

    protected static function deleteCard($user) {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $customer = Customer::retrieve($user->stripe_id);
        $card = Customer::retrieveSource($user->stripe_id, $customer->default_source);
        // $card = $customer->sources->data[0];
        if ( $card ) {
            Customer::deleteSource($user->stripe_id, $card->id);
            return true;
        }
        return false;
    }

}
