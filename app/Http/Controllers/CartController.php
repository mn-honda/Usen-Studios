<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Cart;
use App\Models\CartDetail;

class CartController extends Controller
{
    public function index() {
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);
        return view('user.cart.index', compact('user'));
    }

    public function add(Request $request) {
        $user_id = auth()->user()->id;
        $cart = $this->findUserCart($user_id);
        $cart_detail = new CartDetail();

        $cart_detail->cart_id = $cart->id;
        $cart_detail->product_id = $request->product_id;
        $cart_detail->size_id = $request->size_id;
        $cart_detail->quantity = $request->quantity;
        $cart_detail->amount = $request->quantity * $cart_detail->product->price;
        $cart_detail->save();

        $cart->amount += $cart_detail->amount;
        $cart->save();

        return redirect("/product/detail/{$request->id}");
    }

    public function update(Request $request) {
        $cart_detail = CartDetail::findOrFail($request->cart_detail->id);

        $prev_cart_detail_amount = $cart_detail->amount;
        $cart_detail->quantity = $request->quantity;
        $cart_detail->amount = $request->quantity * $cart_detail->product->price;
        $cart_detail->save();

        $cart = $cart_detail->cart;
        $cart->amount += $cart_detail->amount - $prev_cart_detail_amount;
        $cart->save();

        return redirect("/cart");
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
        $cart = Cart::where('user_id', $user_id);
        if ( $cart == null ) {
            $cart = new Cart();
            $cart->user_id = $user_id;
            return $cart;
        }
        return $cart;
    }

}
