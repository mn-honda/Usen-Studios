<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;

use App\Models\User;
use App\Models\Credit;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\Delivery;

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
        $this->validate($request, [
            'card_number_1' => 'required|digits:4',
            'card_number_2' => 'required|digits:4',
            'card_number_3' => 'required|digits:4',
            'card_number_4' => 'required|digits:4',
            'expiration' => 'required',
            'security_code' => 'required|between:3,4',
            'card_name' => 'required',
        ]);

        $user_id = auth()->user()->id;
        $credit = Credit::where('user_id', '=', $user_id)->first();
        if ( $credit == null ) {
            $credit = new Credit();
            $credit->user_id = $user_id;
        }

        // カード情報各種
        $credit->name = $request->card_name;
        // $credit->card_number = $request->card_number;
        $credit->card_number = $request->card_number_1 . $request->card_number_2 . $request->card_number_3 . $request->card_number_4;
        $credit->security_code = $request->security_code;
        $expiration = $request->expiration . -01;
        // $expiration->addMonth()->subDay();
        $credit->expiration = $expiration;

        // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // クレジットカードの情報が正しいかどうかの判定をどこかで追加したい
        // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

        $credit->save();

        return redirect('/sale/confirm');

    }

    public function procedure() {
        $user_id = auth()->user()->id;

        // カートの中の商品を購入履歴に追加
        $sale_id = $this->move_cart_to_sale($user_id);
        $sale = Sale::find($sale_id);
        // deliveriesテーブルの作成
        $deliveries = new Delivery();
        $deliveries->date = $sale->date;;
        $deliveries->sale_id = $sale_id;
        $deliveries->save();

        // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
        // 購入時の処理は時間があれば記述したい
        $sale_flag = true;
        // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

        if ( $sale_flag ) {
            return redirect("/sale/complete/{$sale_id}");
        }
        // 失敗時はその時の処理が必要になるかも
        return redirect('/cart');

    }

    public function complete($id) {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $sale = Sale::find($id);
        // var_dump($sale->sale_details);
        // return;
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

}