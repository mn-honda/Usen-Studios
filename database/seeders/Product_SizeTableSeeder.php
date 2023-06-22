<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Product_SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1;$i <= 28;$i++){
            for($j = 1;$j <= 5;$j++){
                DB::table('product_size')->insert(
                    [
                        "product_id" => $i,"size_id" => $j
                    ]);
            }
        }
    }
}
