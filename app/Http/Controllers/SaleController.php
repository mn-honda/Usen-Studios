<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Stripe\Stripe;
use Stripe\Charge;
use Exception;

use App\Models\User;
use App\Models\Credit;
use App\Models\Sale;
use App\Models\SaleDetail;
use Stripe\Exception\CardException;
use App\Models\Delivery;

class SaleController extends Controller
{

    public function confirm() {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $card = Credit::getDefaultCard($user);
        // クレジットカードの登録確認
        if ( $card == null ) {
            return redirect('/sale/registration_credit');
        }
        return view('user.sale.confirm', compact('user', 'card'));
    }

    public function registration_credit() {
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);
        return view('user.sale.registration_credit', compact('user'));
    }

    public function procedure() {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // 購入時の処理は時間があれば記述したい
        // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // 会計処理
        $this->payment($user->cart->amount+800);
        // カートの中の商品を購入履歴に追加
        $sale_id = $this->move_cart_to_sale($user_id);
        $sale = Sale::find($sale_id);

        // deliveriesテーブルの作成
        $deliveries = new Delivery();
        $deliveries->date = $sale->date;;
        $deliveries->sale_id = $sale_id;
        $deliveries->save();

        return redirect("/sale/complete/{$sale_id}");
        // 失敗時はその時の処理が必要
        // ↑個々に実装
        // return redirect('/cart');

    }

    public function complete($id) {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $sale = Sale::find($id);
        return view('user.sale.complete', compact('user', 'sale'));
    }

    private function move_cart_to_sale($user_id) {
        $user = User::find($user_id);

        $cart = $user->cart;
        $cart_details = $cart->cart_details;

        $sale = new Sale();
        $sale->date = Carbon::now();
        $sale->user_id = $user_id;
        $sale->amount = 0;
        $sale->save();

        foreach ( $cart_details as $cart_detail ) {
            $sale_detail = new SaleDetail();
            $sale_detail->user_id = $user_id;
            $sale_detail->sale_id = $sale->id;
            $sale_detail->product_id = $cart_detail->product_id;
            $sale_detail->size_id = $cart_detail->size_id;
            $sale_detail->quantity = $cart_detail->quantity;
            $sale_detail->amount = $cart_detail->amount;
            $sale_detail->save();
            $sale->amount += $cart_detail->amount;
        }
        $length = count($cart_details);
        for ( $i = 0; $i < $length; $i++ ) {
            $cart_details[$i]->delete();
        }
        $cart->amount = 0;
        $cart->save();
        $sale->save();

        return $sale->id;
    }

    // public function payment(Request $request) {
    private function payment($amount) {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        try {
            $charge = Charge::create([
                'amount' => $amount,
                'currency' => 'jpy',
                'customer' => $user->stripe_id,
            ]);
        } catch (CardException $e) {
            // 決済失敗
            return redirect('/sale/confirm');
        }
    }

    public function registration_credit_into_stripe(Request $request) {
        $token = $request->stripeToken;
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        if ( !$token ) {
            // サーバーのエラー
            return redirect('/product');
        }
        if ( $user->stripe_id ) {
            $default_card = Credit::getDefaultCard($user);
            if ( isset($default_card['id']) ) {
                Credit::deleteCard($user);
            }
            $result = Credit::updateCustomer($token, $user);
            if ( !$result  ) {
                // カード情報の不備
                return redirect('/sale/registration_credit');
            }
        } else {
            $result = Credit::setCustomer($token, $user);
            if ( !$result ) {
                // カード情報の不備
                return redirect('/sale/registration_credit');
            }
        }
        // カードの登録完了
        return redirect('/sale/confirm');
    }

}