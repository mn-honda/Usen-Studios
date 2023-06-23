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
                ['explanation' => "メンズアウター","filepath" => "/images/M'outer/スクリーンショット 2023-06-21 110723.png","product_id" => 1], 
                ['explanation' => "メンズアウター","filepath" => "/images/M'outer/スクリーンショット 2023-06-21 112113.png","product_id" => 2], 
                ['explanation' => "メンズスウェット","filepath" => "/images/M'sweat/BI0185-BM0_D.jpg","product_id" => 3], 
                ['explanation' => "メンズスウェット","filepath" => "/images/M'sweat/CI0126-CVD_FLAT.jpg","product_id" => 4], 
                ['explanation' => "メンズニット","filepath" => "/images/M'knit/B60296-838_E.jpg","product_id" => 5], 
                ['explanation' => "メンズニット","filepath" => "/images/M'knit/B60297-CTI_E.jpg","product_id" => 6], 
                ['explanation' => "メンズTシャツ","filepath" => "/images/M'Tshirt/BL0358-BM0_FLAT.jpg","product_id" => 7], 
                ['explanation' => "メンズTシャツ","filepath" => "/images/M'Tshirt/CL0195-183_D (1).jpg","product_id" => 8], 
                ['explanation' => "メンズジーンズ","filepath" => "/images/M'jeans/A00402-AUZ_F.jpg","product_id" => 9], 
                ['explanation' => "メンズジーンズ","filepath" => "/images/M'jeans/B00271-900_FLAT.jpg","product_id" => 10], 
                ['explanation' => "メンズショーツ","filepath" => "/images/M'shorts/BE0123-900_FLAT.jpg","product_id" => 11], 
                ['explanation' => "メンズショーツ","filepath" => "/images/M'shorts/BE0089-900_FLAT.jpg","product_id" => 12], 
                ['explanation' => "メンズトラウザーズ","filepath" => "/images/M'trousers/BK0532-900_E.jpg","product_id" => 13], 
                ['explanation' => "メンズトラウザーズ","filepath" => "/images/M'trousers/BK0533-900_E.jpg","product_id" => 14], 
                ['explanation' => "ウィメンズアウター","filepath" => "/images/W'outer/A70155-900_F.jpg","product_id" => 15], 
                ['explanation' => "ウィメンズアウター","filepath" => "/images/W'outer/A90520-A_M_F.jpg","product_id" => 16], 
                ['explanation' => "ウィメンズスウェット","filepath" => "/images/W'sweat/CI0126-900_FLAT (1).jpg","product_id" => 17], 
                ['explanation' => "ウィメンズスウェット","filepath" => "/images/W'sweat/AI0067-900_FLAT.jpg","product_id" => 18], 
                ['explanation' => "ウィメンズニット","filepath" => "/images/W'knit/A60433-A_M_D.jpg","product_id" => 19], 
                ['explanation' => "ウィメンズニット","filepath" => "/images/W'knit/A60280-BP5_FLAT.jpg","product_id" => 22],
                ['explanation' => "ウィメンズTシャツ","filepath" => "/images/W'Tshirt/CL0199-CVD_FLAT.jpg","product_id" => 20], 
                ['explanation' => "ウィメンズTシャツ","filepath" => "/images/W'Tshirt/AL0351-AB8_E.jpg","product_id" => 21], 
                ['explanation' => "ウィメンズジーンズ","filepath" => "/images/W'jeans/A00335-900_F.jpg","product_id" => 23], 
                ['explanation' => "ウィメンズジーンズ","filepath" => "/images/W'jeans/A00346-AEK_FLAT.jpg","product_id" => 24], 
                ['explanation' => "ウィメンズショーツ","filepath" => "/images/W'shorts/CE0036-DF9_D.jpg","product_id" => 25], 
                ['explanation' => "ウィメンズショーツ","filepath" => "/images/W'shorts/CE0035-DFF_D.jpg","product_id" => 26], 
                ['explanation' => "ウィメンズトラウザーズ","filepath" => "/images/W'trousers/AK0699-900_E.jpg","product_id" => 27], 
                ['explanation' => "ウィメンズトラウザーズ","filepath" => "/images/W'trousers/AK0691-A_V_E.jpg","product_id" => 28], 
                
            ]);
    }
}
