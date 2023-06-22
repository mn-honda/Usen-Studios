<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('images')->insert(
            [
                ['explanetion' => "メンズアウター","filepath" => "/public/images/M'outer/スクリーンショット 2023-06-21 112113.png","product_id" => 1], 
                ['explanetion' => "メンズアウター","filepath" => "","product_id" => 2], 
                ['explanetion' => "メンズスウェット","filepath" =>,"product_id" => 3], 
                ['explanetion' => "メンズスウェット","filepath" => "","product_id" => 4], 
                ['explanetion' => "メンズニット","filepath" => "","product_id" => 5], 
                ['explanetion' => "メンズニット","filepath" => "","product_id" => 6], 
                ['explanetion' => "メンズTシャツ","filepath" => "","product_id" => 7], 
                ['explanetion' => "メンズTシャツ","filepath" => "","product_id" => 8], 
                ['explanetion' => "メンズジーンズ","filepath" => "","product_id" => 9], 
                ['explanetion' => "メンズジーンズ","filepath" => "","product_id" => 10], 
                ['explanetion' => "メンズショーツ","filepath" => "","product_id" => 11], 
                ['explanetion' => "メンズショーツ","filepath" => "","product_id" => 12], 
                ['explanetion' => "メンズトラウザーズ","filepath" => "","product_id" => 13], 
                ['explanetion' => "メンズトラウザーズ","filepath" => "","product_id" => 14], 
                ['explanetion' => "ウィメンズアウター","filepath" => "","product_id" => 15], 
                ['explanetion' => "ウィメンズアウター","filepath" => "","product_id" => 16], 
                ['explanetion' => "ウィメンズスウェット","filepath" =>,"product_id" => 17], 
                ['explanetion' => "ウィメンズスウェット","filepath" => "","product_id" => 18], 
                ['explanetion' => "ウィメンズニット","filepath" => "","product_id" => 19], 
                ['explanetion' => "ウィメンズニット","filepath" => "","product_id" => 20], 
                ['explanetion' => "ウィメンズTシャツ","filepath" => "","product_id" => 21], 
                ['explanetion' => "ウィメンズTシャツ","filepath" => "","product_id" => 22], 
                ['explanetion' => "ウィメンズジーンズ","filepath" => "","product_id" => 23], 
                ['explanetion' => "ウィメンズジーンズ","filepath" => "","product_id" => 24], 
                ['explanetion' => "ウィメンズショーツ","filepath" => "","product_id" => 25], 
                ['explanetion' => "ウィメンズショーツ","filepath" => "","product_id" => 26], 
                ['explanetion' => "ウィメンズトラウザーズ","filepath" => "","product_id" => 27], 
                ['explanetion' => "ウィメンズトラウザーズ","filepath" => "","product_id" => 28], 
               
                
            ]);
    }
}
