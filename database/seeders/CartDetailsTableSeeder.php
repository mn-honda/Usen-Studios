<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Size;

class CartDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carts = Cart::all();
        // カートの数だけ繰り返す
        foreach ( $carts as $cart ) {
            // 一つのカートにどれだけの商品を追加するか
            $iterations_count = random_int(1, 5);
            for ( $index = 0; $index < $iterations_count; $index++ ) {
                // プロダクトテーブルの中から購入する商品をランダムに選ぶ
                $product = Product::inRandomOrder()->first();
                // サイズも同様
                $size_id = Size::inRandomOrder()->first()->id;
                // 数は1~5
                $quantity = random_int(1, 5);
                // 合計金額を計算
                $amount = $product->price * $quantity;
                DB::table('cart_details')->insert([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'size_id' => $size_id,
                    'quantity' => $quantity,
                    'amount' => $amount,
                ]);
                // 所属するカートの合計金額を更新
                $cart->amount += $amount;
            }
            $cart->save();
        }
    }
}
