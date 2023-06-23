<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\Models\Product;

class _StocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        foreach ( $products as $product ) {
            DB::table('stocks')->insert([
                'product_id'=>$product->id, 'stock'=>random_int(0, 10),
            ]);
        }
    }
}
