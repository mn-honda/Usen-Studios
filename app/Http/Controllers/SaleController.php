<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
use Barryvdh\DomPDF\Facade\Pdf;

class SaleController extends Controller
{

    public function confirm() {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $card = Credit::getDefaultCard($user);
        // カートの中身確認
        if ( $user->cart->amount <= 0 ) {
            return redirect('/cart')->with('message', 'カートが空です。');
        }
        // 在庫が足りてない
        if ( !$this->is_sufficient_stock($user) ) {
            return redirect('/cart')->with('message', '現在在庫が不足しております。再入荷までしばらくお待ちください。');
        }
        // クレジットカードの登録確認
        if ( $card == null ) {
            return redirect('/sale/registration_credit');
        }
        return view('user.sale.confirm', compact('user', 'card'));
    }

    private function is_sufficient_stock($user) {
        $cart_details = $user->cart->cart_details;
        foreach ( $cart_details as $cart_detail ) {
            if ( $cart_detail->product->stock->stock < $cart_detail->quantity ) {
                return false;
            }
        }
        return true;
    }

    public function registration_credit() {
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);
        return view('user.sale.registration_credit', compact('user'));
    }

    public function procedure() {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        // 会計処理
        if ( $user->cart->amount <= 0 ) {
            // カートに商品がない
            return redirect('/index');
        }
        // 購入時の処理
        $charge_id = $this->payment($user->cart->amount+800);
        if ( $charge_id == false ) {
            return redirect('/sale/confirm');
        }
        // カートの中身を購入済みテーブルに移動
        // 在庫を減らす
        $sale_id = $this->sale_process($user_id, $charge_id);
        if ( $sale_id == false ) {
            return redirect('/sale/confirm');
        }
        $sale = Sale::find($sale_id);
        $this->send_mail($user, $sale);

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
        $sale_id = $id;
        return view('user.sale.complete', compact('sale_id'));
    }

    public function receipt($id) {
        $sale = Sale::find($id);
        $pdf = Pdf::loadView('pdf.receipt', compact('sale'));
        $pdf->setPaper('A4');
        return $pdf->stream();
    }

    public function list() {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        return view('user.sale.list', compact('user'));
    }

    public function edit_user() {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        return view('user.contact.edit_user', compact('user'));
    }

    public function update_user(Request $request) {
        $this->validate($request, [
            'name' => ['required'],
            'email' => ['required'],
            'post_code' =>['required','regex:/^[0-9]{7}$/'],
            'address' =>['required'],
        ]);

        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->post_code = $request->post_code;
        $user->address = $request->address;

        $user->save();

        return redirect('user/list');

    }

    private function send_mail($user, $sale) {
        $title = 'UsenStudios ご注文完了のお知らせ';
        $email = $user->email;

         // メールの送信処理
        Mail::send('email.sale', [
            'user' => $user,
            'sale' => $sale,
        ], function ($message) use ($email, $title) {
            $message->to($email)->subject($title);
        });
    }

    private function sale_process($user_id, $charge_id) {
        $user = User::find($user_id);
        $cart = $user->cart;
        $cart_details = $cart->cart_details;

        foreach ( $cart_details as $val ) {
            if ( $val->product->stock->stock < $val->quantity ) {
                return false;
            }
        }
        foreach ( $cart_details as $val ) {
            $val->product->stock->stock -= $val->quantity;
            $val->product->stock->save();
        }

        $sale = new Sale();
        $sale->date = Carbon::now();
        $sale->user_id = $user_id;
        $sale->amount = 0;
        $sale->charge_id = $charge_id;
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
            return false;
            // return redirect('/sale/confirm');
        }
        return $charge->id;
    }

    public function registration_credit_into_stripe(Request $request) {
        $token = $request->stripeToken;
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        if ( !$token ) {
            // サーバーのエラー
            return redirect('/index');
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
