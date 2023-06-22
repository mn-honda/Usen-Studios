<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class StocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=12; $i<=39; $i++){
            DB::table('stocks')->insert(
            ['product_id'=>"$i", 'stock'=>"0"]);
        }
    }
}
