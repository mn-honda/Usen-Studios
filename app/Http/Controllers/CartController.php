<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Cart;
use App\Models\Stock;
use App\Models\CartDetail;

class CartController extends Controller
{
    public function index() {
        $user_id = auth()->user()->id;
        $cart = $this->findUserCart($user_id);
        // $stocks = Stock::all();
        // return view('user.cart.index', compact('cart', 'stocks'));
        return view('user.cart.index', compact('cart'));
    }

    public function add(Request $request) {
        $user_id = auth()->user()->id;
        $cart = $this->findUserCart($user_id);

        $cart_details = $cart->cart_details;
        foreach ( $cart_details as $cart_detail ) {
            if ( $cart_detail->product->id == $request->product_id) {
                $this->updateCart($cart_detail->id, $cart_detail->quantity + $request->quantity);
                return back();
            }
        }

        $cart_detail = new CartDetail();

        $cart_detail->cart_id = $cart->id;
        $cart_detail->product_id = $request->product_id;
        $cart_detail->size_id = $request->size;
        $cart_detail->quantity = $request->quantity;
        $cart_detail->amount = $request->quantity * $cart_detail->product->price;
        $cart_detail->save();

        $cart->amount += $cart_detail->amount;
        $cart->save();

        // return redirect("/product_detail/{$request->product_id}");
        return back()->with("message","カートに追加しました");
    }


    public function update(Request $request) {
        $this->updateCart($request->cart_detail_id, $request->cart_detail_quantity);
        return back();
    }

    private function updateCart($cart_detail_id, $quantity) {
        $cart_detail = CartDetail::findOrFail($cart_detail_id);

        $prev_cart_detail_amount = $cart_detail->amount;
        $cart_detail->quantity = $quantity;
        $cart_detail->amount = $cart_detail->quantity * $cart_detail->product->price;
        $cart_detail->save();

        $cart = $cart_detail->cart;
        $cart->amount += $cart_detail->amount - $prev_cart_detail_amount;
        $cart->save();
    }

    public function delete($id) {
        $cart_detail = CartDetail::findOrFail($id);

        $cart_detail_amount = $cart_detail->amount;
        $cart = $cart_detail->cart;
        $cart->amount -= $cart_detail_amount;
        $cart->save();
        $cart_detail->delete();

        return redirect("/cart");
    }

    private function findUserCart($user_id) {
        $cart = Cart::where('user_id', $user_id)->first();
        if ( $cart != null ) {
            return Cart::find($cart->id);
        }
        $cart = new Cart();
        $cart->user_id = $user_id;
        $cart->amount = 0;
        $cart->save();
        return $cart;
    }

}
