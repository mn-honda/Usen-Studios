<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;
use App\Models\Size;

class _Product_SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        $sizes = Size::all();
        foreach ( $products as $product ) {
            foreach ( $sizes as $size ) {
                DB::table('product_size')->insert([
                    "product_id" => $product->id,"size_id" => $size->id,
                ]);
            }
        }
    }
}
