<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Credit;
use App\Models\Sale;
use App\Models\SaleDetail;

class SaleController extends Controller
{

    public function confirm() {
        $user_id = auth()->user()->id;
        // クレジットカードの登録確認
        $credit = Credit::where('user_id', '=', $user_id)->get();
        if ( count($credit) <= 0 ) {
            // クレカ登録の進捗次第
            return redirect('/sale/registration_credit');
        }

        $user = User::findOrFail($user_id);
        return view('user.sale.confirm', compact('user'));
    }

    public function registration_credit() {
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);
        return view('user.sale.registration_credit', compact('user'));
    }

    public function registration_credit_into_DB(Request $request) {
        // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // バリデート...
        // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

        $user_id = auth()->user()->id;
        $credit = Credit::where('user_id', '=', $user_id)->first();
        if ( $credit == null ) {
            $credit = new Credit();
            $credit->user_id = $user_id;
        }

        // カード情報各種
        $credit->name = $request->card_name;
        $credit->card_number = $request->card_number;
        $credit->security_code = $request->security_code;
        // timestamp: $credit->expiration = strtotime('YY-MM-DD');
        $expiration = "{$request->expiration_yy}-{$request->expiration_mm}-00";
        $credit->expiration = strtotime($expiration);

        // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // クレジットカードの情報が正しいかどうかの判定をどこかで追加したい
        // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

        $credit()->save();

        return redirect('/sale/confirm');

    }

    public function procedure() {
        $user_id = auth()->user()->id;

        // カートの中の商品を購入履歴に追加
        $this->move_cart_to_sale($user_id);

        // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // 購入時の処理は時間があれば記述したい
        $sale_flag = true;
        // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

        if ( $sale_flag ) {
            return redirect('/sale/complete');
        }
        // 失敗時はその時の処理が必要になるかも
        return redirect('/cart');

    }

    public function complete() {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('user.sale.complete', compact('user'));
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
    }

}