<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Cart;

class CartDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cart_length = Cart::all()->count();
        for ( $cart_id = 1; $cart_id < $cart_length; $cart_id++ ) {
            $cart = Cart::findOrFail($cart_id);
            $iterations_count = random_int(1, 5);
            for ( $index = 0; $index < $iterations_count; $index++ ) {
                $product_length = Product::all()->count();
                $product_id = random_int(1, $product_length);
                $quantity = random_int(1, 5);
                $product = Product::findOrFail($product_id);
                $size_id = random_int(1, count($product->sizes));
                $amount = Product::findOrFail('product_id') * $quantity;
                DB::table('cart_details')->insert([
                    'cart_id' => $cart_id,
                    'product_id' => $product_id,
                    'size_id' => $size_id,
                    'quantity' => $quantity,
                    'amount' => $amount,
                ]);
                $cart->amount += $amount;
            }
            $cart->save();
        }
    }
}
