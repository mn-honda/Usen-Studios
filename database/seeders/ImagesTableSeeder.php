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
                ['explanation' => "メンズアウター","filepath" => "/images/M'outer/スクリーンショット 2023-06-21 110723.png","product_id" => 3], 
                ['explanation' => "メンズアウター","filepath" => "/images/M'outer/B90722-BMZ_F.jpg","product_id" => 4], 
                ['explanation' => "メンズアウター","filepath" => "/images/M'outer/スクリーンショット 2023-06-21 112113.png","product_id" => 5], 
                ['explanation' => "メンズアウター","filepath" => "/images/M'outer/スクリーンショット 2023-06-21 112933.png","product_id" => 6], 
                ['explanation' => "メンズアウター","filepath" => "/images/M'outer/スクリーンショット 2023-06-21 112911.png","product_id" => 7], 
                ['explanation' => "メンズアウター","filepath" => "/images/M'outer/スクリーンショット 2023-06-21 113059.png","product_id" => 8], 
                ['explanation' => "メンズアウター","filepath" => "/images/M'outer/スクリーンショット 2023-06-21 113010.png","product_id" => 9], 
                ['explanation' => "メンズアウター","filepath" => "/images/M'outer/スクリーンショット 2023-06-21 113401.png","product_id" => 10], 
                ['explanation' => "メンズアウター","filepath" => "/images/M'outer/スクリーンショット 2023-06-21 113044.png","product_id" => 11], 
                ['explanation' => "メンズアウター","filepath" => "/images/M'outer/スクリーンショット 2023-06-21 113022.png","product_id" => 12], 

                ['explanation' => "メンズスウェット","filepath" => "/images/M'sweat/BI0185-BM0_D.jpg","product_id" => 13], 
                ['explanation' => "メンズスウェット","filepath" => "/images/M'sweat/CI0126-900_FLAT.jpg","product_id" => 14], 
                ['explanation' => "メンズスウェット","filepath" => "/images/M'sweat/CI0126-CVD_FLAT.jpg","product_id" => 15], 
                ['explanation' => "メンズスウェット","filepath" => "/images/M'sweat/BI0182-900_FLAT.jpg","product_id" => 16], 
                ['explanation' => "メンズスウェット","filepath" => "/images/M'sweat/BI0182-ASA_FLAT.jpg","product_id" => 17], 
                ['explanation' => "メンズスウェット","filepath" => "/images/M'sweat/CI0129-900_FLAT.jpg","product_id" => 18], 
                ['explanation' => "メンズスウェット","filepath" => "/images/M'sweat/CI0129-AAO_FLAT.jpg","product_id" => 19], 
                ['explanation' => "メンズスウェット","filepath" => "/images/M'sweat/CI0140-CKM_FLAT.jpg","product_id" => 20], 
                ['explanation' => "メンズスウェット","filepath" => "/images/M'sweat/CI0140-X92_FLAT.jpg","product_id" => 21], 
                ['explanation' => "メンズスウェット","filepath" => "/images/M'sweat/CI0141-900_FLAT.jpg","product_id" => 22], 
                ['explanation' => "メンズスウェット","filepath" => "/images/M'sweat/CI0141-CUE_FLAT.jpg","product_id" => 23], 
                ['explanation' => "メンズスウェット","filepath" => "/images/M'sweat/CI0141-X92_FLAT.jpg","product_id" => 24], 

                ['explanation' => "メンズニット","filepath" => "/images/M'knit/B60296-838_E.jpg","product_id" => 25], 
                ['explanation' => "メンズニット","filepath" => "/images/M'knit/B60293-DHH_E.jpg","product_id" => 26], 
                ['explanation' => "メンズニット","filepath" => "/images/M'knit/B60297-CTI_E.jpg","product_id" => 27], 
                ['explanation' => "メンズニット","filepath" => "/images/M'knit/C60070-DFN_FLAT.jpg","product_id" => 28], 
                ['explanation' => "メンズニット","filepath" => "/images/M'knit/C60070-DFI_FLAT.jpg","product_id" => 29], 
                ['explanation' => "メンズニット","filepath" => "/images/M'knit/C60073-AAJ_E.jpg","product_id" => 30], 
                ['explanation' => "メンズニット","filepath" => "/images/M'knit/B60264-BLG_FLAT.jpg","product_id" => 31], 
                ['explanation' => "メンズニット","filepath" => "/images/M'knit/B60262-D98_FLAT.jpg","product_id" => 32], 
                ['explanation' => "メンズニット","filepath" => "/images/M'knit/B60268-AAY_FLAT.jpg","product_id" => 33], 
                ['explanation' => "メンズニット","filepath" => "/images/M'knit/B60261-BRH_F.jpg","product_id" => 34], 
                ['explanation' => "メンズニット","filepath" => "/images/M'knit/B60254-AB9_E.jpg","product_id" => 35], 
                ['explanation' => "メンズニット","filepath" => "/images/M'knit/B60217-AA2_FLAT.jpg","product_id" => 36], 

                ['explanation' => "メンズTシャツ","filepath" => "/images/M'Tshirt/BL0358-BM0_FLAT.jpg","product_id" => 37], 
                ['explanation' => "メンズTシャツ","filepath" => "/images/M'Tshirt/CL0195-183_D (1).jpg","product_id" => 38], 
                ['explanation' => "メンズTシャツ","filepath" => "/images/M'Tshirt/BL0278-900_FLAT.jpg","product_id" => 39], 
                ['explanation' => "メンズTシャツ","filepath" => "/images/M'Tshirt/BL0278-AEA_D.jpg","product_id" => 40], 
                ['explanation' => "メンズTシャツ","filepath" => "/images/M'Tshirt/BL0279-900_FLAT.jpg","product_id" => 41], 
                ['explanation' => "メンズTシャツ","filepath" => "/images/M'Tshirt/BL0279-183_FLAT.jpg","product_id" => 42], 
                ['explanation' => "メンズTシャツ","filepath" => "/images/M'Tshirt/CL0201-92H_D.jpg","product_id" => 43], 
                ['explanation' => "メンズTシャツ","filepath" => "/images/M'Tshirt/CL0210-BM0_FLAT.jpg","product_id" => 44], 
                ['explanation' => "メンズTシャツ","filepath" => "/images/M'Tshirt/CL0210-183_FLAT.jpg","product_id" => 45], 
                ['explanation' => "メンズTシャツ","filepath" => "/images/M'Tshirt/CL0219-900_FLAT.jpg","product_id" => 46], 
                ['explanation' => "メンズTシャツ","filepath" => "/images/M'Tshirt/CL0219-183_FLAT.jpg","product_id" => 47], 
                ['explanation' => "メンズTシャツ","filepath" => "/images/M'Tshirt/CL0217-BHO_D.jpg","product_id" => 48], 

                ['explanation' => "メンズジーンズ","filepath" => "/images/M'jeans/A00402-AUZ_F.jpg","product_id" => 49], 
                ['explanation' => "メンズジーンズ","filepath" => "/images/M'jeans/B00271-900_FLAT.jpg","product_id" => 50], 
                ['explanation' => "メンズジーンズ","filepath" => "/images/M'jeans/B00157-838_FLAT.jpg","product_id" => 51], 
                ['explanation' => "メンズジーンズ","filepath" => "/images/M'jeans/B00269-900_FLAT.jpg","product_id" => 52],
                ['explanation' => "メンズジーンズ","filepath" => "/images/M'jeans/B00292-863_FLAT.jpg","product_id" => 53],
                ['explanation' => "メンズジーンズ","filepath" => "/images/M'jeans/B00294-900_FLAT.jpg","product_id" => 54],
                ['explanation' => "メンズジーンズ","filepath" => "/images/M'jeans/B00283-AEK_FLAT.jpg","product_id" => 55],
                ['explanation' => "メンズジーンズ","filepath" => "/images/M'jeans/B00281-CUM_G.jpg","product_id" => 56],
                ['explanation' => "メンズジーンズ","filepath" => "/images/M'jeans/B00304-BWL_F.jpg","product_id" => 57],
                ['explanation' => "メンズジーンズ","filepath" => "/images/M'jeans/B00321-ANZ_F.jpg","product_id" => 58],
                ['explanation' => "メンズジーンズ","filepath" => "/images/M'jeans/C00037-900_FLAT.jpg","product_id" => 59],
                ['explanation' => "メンズジーンズ","filepath" => "/images/M'jeans/C00015-900_FLAT.jpg","product_id" => 60],
 
                ['explanation' => "メンズショーツ","filepath" => "/images/M'shorts/BE0123-900_FLAT.jpg","product_id" => 61], 
                ['explanation' => "メンズショーツ","filepath" => "/images/M'shorts/BE0089-900_FLAT.jpg","product_id" => 62], 
                ['explanation' => "メンズショーツ","filepath" => "/images/M'shorts/BE0089-AA4_FLAT.jpg","product_id" => 63], 
                ['explanation' => "メンズショーツ","filepath" => "/images/M'shorts/BE0122-863_F.jpg","product_id" => 64], 
                ['explanation' => "メンズショーツ","filepath" => "/images/M'shorts/BE0123-900_FLAT.jpg","product_id" => 65], 
                ['explanation' => "メンズショーツ","filepath" => "/images/M'shorts/BE0123-++Z_D.jpg","product_id" => 66], 
                ['explanation' => "メンズショーツ","filepath" => "/images/M'shorts/CE0034-900_FLAT.jpg","product_id" => 67], 
                ['explanation' => "メンズショーツ","filepath" => "/images/M'shorts/CE0034-X92_FLAT.jpg","product_id" => 68], 
                ['explanation' => "メンズショーツ","filepath" => "/images/M'shorts/CE0034-CKM_FLAT.jpg","product_id" => 69], 
                ['explanation' => "メンズショーツ","filepath" => "/images/M'shorts/BJ0020-COX_E.jpg","product_id" => 70], 
                ['explanation' => "メンズショーツ","filepath" => "/images/M'shorts/CE0041-CHS_E.jpg","product_id" => 71], 
                ['explanation' => "メンズショーツ","filepath" => "/images/M'shorts/BE0128-BWL_F.jpg","product_id" => 72], 

                ['explanation' => "メンズトラウザーズ","filepath" => "/images/M'trousers/BK0532-900_E.jpg","product_id" => 73], 
                ['explanation' => "メンズトラウザーズ","filepath" => "/images/M'trousers/BK0533-900_E.jpg","product_id" => 74], 
                ['explanation' => "メンズトラウザーズ","filepath" => "/images/M'trousers/BK0509-900_FLAT.jpg","product_id" => 75], 
                ['explanation' => "メンズトラウザーズ","filepath" => "/images/M'trousers/BK0509-BZG_FLAT.jpg","product_id" => 76], 
                ['explanation' => "メンズトラウザーズ","filepath" => "/images/M'trousers/BK0506-AUZ_E.jpg","product_id" => 77], 
                ['explanation' => "メンズトラウザーズ","filepath" => "/images/M'trousers/BK0510-900_E.jpg","product_id" => 78], 
                ['explanation' => "メンズトラウザーズ","filepath" => "/images/M'trousers/BK0524-DBH_G.jpg","product_id" => 79], 
                ['explanation' => "メンズトラウザーズ","filepath" => "/images/M'trousers/BK0538-900_FLAT.jpg","product_id" => 80], 
                ['explanation' => "メンズトラウザーズ","filepath" => "/images/M'trousers/BK0538-CVD_FLAT.jpg","product_id" => 81], 
                ['explanation' => "メンズトラウザーズ","filepath" => "/images/M'trousers/BK0563-BUF_E.jpg","product_id" => 82], 
                ['explanation' => "メンズトラウザーズ","filepath" => "/images/M'trousers/CK0083-CVI_E.jpg","product_id" => 83], 
                ['explanation' => "メンズトラウザーズ","filepath" => "/images/M'trousers/CK0084-900_E.jpg","product_id" => 84], 

                ['explanation' => "ウィメンズアウター","filepath" => "/images/W'outer/A70155-900_F.jpg","product_id" => 85], 
                ['explanation' => "ウィメンズアウター","filepath" => "/images/W'outer/A90520-A_M_F.jpg","product_id" => 86], 
                ['explanation' => "ウィメンズアウター","filepath" => "/images/W'outer/A90533-BGU_FLAT.jpg","product_id" => 87], 
                ['explanation' => "ウィメンズアウター","filepath" => "/images/W'outer/A90533-AE5_FLAT.jpg","product_id" => 88], 
                ['explanation' => "ウィメンズアウター","filepath" => "/images/W'outer/A90567-AEK_F.jpg","product_id" => 89], 
                ['explanation' => "ウィメンズアウター","filepath" => "/images/W'outer/C90094-228_F.jpg","product_id" => 90], 
                ['explanation' => "ウィメンズアウター","filepath" => "/images/W'outer/A90523-228_F.jpg","product_id" => 91], 
                ['explanation' => "ウィメンズアウター","filepath" => "/images/W'outer/A90501-228_F.jpg","product_id" => 92], 
                ['explanation' => "ウィメンズアウター","filepath" => "/images/W'outer/スクリーンショット 2023-06-21 112113.png","product_id" => 93], 
                ['explanation' => "ウィメンズアウター","filepath" => "/images/W'outer/スクリーンショット 2023-06-21 113059.png","product_id" => 94], 
                ['explanation' => "ウィメンズアウター","filepath" => "/images/W'outer/AH0218-900_FLAT.jpg","product_id" => 95], 
                ['explanation' => "ウィメンズアウター","filepath" => "/images/W'outer/AH0218-++6_F.jpg","product_id" => 96], 

                ['explanation' => "ウィメンズスウェット","filepath" => "/images/W'sweat/CI0126-900_FLAT (1).jpg","product_id" => 97], 
                ['explanation' => "ウィメンズスウェット","filepath" => "/images/W'sweat/AI0067-900_FLAT.jpg","product_id" => 98],
                ['explanation' => "ウィメンズスウェット","filepath" => "/images/W'sweat/AI0067-183_FLAT.jpg","product_id" => 99], 
                ['explanation' => "ウィメンズスウェット","filepath" => "/images/W'sweat/AI0133-++F_E.jpg","product_id" => 100], 
                ['explanation' => "ウィメンズスウェット","filepath" => "/images/W'sweat/AI0135-BM0_D.jpg","product_id" => 101], 
                ['explanation' => "ウィメンズスウェット","filepath" => "/images/W'sweat/CI0111-CJC_FLAT.jpg","product_id" => 102], 
                ['explanation' => "ウィメンズスウェット","filepath" => "/images/W'sweat/CI0111-CA9_FLAT.jpg","product_id" => 103], 
                ['explanation' => "ウィメンズスウェット","filepath" => "/images/W'sweat/CI0125-AAO_FLAT.jpg","product_id" => 104], 
                ['explanation' => "ウィメンズスウェット","filepath" => "/images/W'sweat/CI0125-ACH_FLAT.jpg","product_id" => 105], 
                ['explanation' => "ウィメンズスウェット","filepath" => "/images/W'sweat/CI0121-CNK_FLAT.jpg","product_id" => 106], 
                ['explanation' => "ウィメンズスウェット","filepath" => "/images/W'sweat/CI0121-AI3_FLAT.jpg","product_id" => 107], 
                ['explanation' => "ウィメンズスウェット","filepath" => "/images/W'sweat/CI0126-ALJ_FLAT.jpg","product_id" => 108], 

                ['explanation' => "ウィメンズニット","filepath" => "/images/W'knit/A60434-AE5_E.jpg","product_id" => 109], 
                ['explanation' => "ウィメンズニット","filepath" => "/images/W'knit/A60280-BP5_FLAT.jpg","product_id" => 110],
                ['explanation' => "ウィメンズニット","filepath" => "/images/W'knit/A60433-A_M_D.jpg","product_id" => 111], 
                ['explanation' => "ウィメンズニット","filepath" => "/images/W'knit/A60280-900_FLAT.jpg","product_id" => 112],
                ['explanation' => "ウィメンズニット","filepath" => "/images/W'knit/A60280-BOV_FLAT.jpg","product_id" => 113], 
                ['explanation' => "ウィメンズニット","filepath" => "/images/W'knit/A60280-BP5_FLAT.jpg","product_id" => 114],
                ['explanation' => "ウィメンズニット","filepath" => "/images/W'knit/C60038-900_FLAT.jpg","product_id" => 115], 
                ['explanation' => "ウィメンズニット","filepath" => "/images/W'knit/C60038-DC8_FLAT.jpg","product_id" => 116],
                ['explanation' => "ウィメンズニット","filepath" => "/images/W'knit/C60038-AAZ_FLAT.jpg","product_id" => 117], 
                ['explanation' => "ウィメンズニット","filepath" => "/images/W'knit/C60038-990_FLAT.jpg","product_id" => 118],
                ['explanation' => "ウィメンズニット","filepath" => "/images/W'knit/C60062-AAJ_FLAT.jpg","product_id" => 119], 
                ['explanation' => "ウィメンズニット","filepath" => "/images/W'knit/C60062-AZR_FLAT.jpg","product_id" => 120],

                ['explanation' => "ウィメンズTシャツ","filepath" => "/images/W'Tshirt/AL0351-AB8_E.jpg","product_id" => 121], 
                ['explanation' => "ウィメンズTシャツ","filepath" => "/images/W'Tshirt/AL0135-900_FLAT.jpg","product_id" => 122], 
                ['explanation' => "ウィメンズTシャツ","filepath" => "/images/W'Tshirt/AL0135-BV2_FLAT.jpg","product_id" => 123], 
                ['explanation' => "ウィメンズTシャツ","filepath" => "/images/W'Tshirt/AL0135-ABI_FLAT.jpg","product_id" => 124], 
                ['explanation' => "ウィメンズTシャツ","filepath" => "/images/W'Tshirt/AL0312-ABV_E.jpg","product_id" => 125], 
                ['explanation' => "ウィメンズTシャツ","filepath" => "/images/W'Tshirt/CL0195-183_D.jpg","product_id" => 126], 
                ['explanation' => "ウィメンズTシャツ","filepath" => "/images/W'Tshirt/CL0199-900_FLAT.jpg","product_id" => 127], 
                ['explanation' => "ウィメンズTシャツ","filepath" => "/images/W'Tshirt/CL0199-CVD_FLAT.jpg","product_id" => 128], 
                ['explanation' => "ウィメンズTシャツ","filepath" => "/images/W'Tshirt/CL0199-ACH_FLAT.jpg","product_id" => 129], 
                ['explanation' => "ウィメンズTシャツ","filepath" => "/images/W'Tshirt/CL0199-183_FLAT.jpg","product_id" => 130], 
                ['explanation' => "ウィメンズTシャツ","filepath" => "/images/W'Tshirt/CL0215-BM0_FLAT.jpg","product_id" => 131], 
                ['explanation' => "ウィメンズTシャツ","filepath" => "/images/W'Tshirt/CL0215-BHU_FLAT.jpg","product_id" => 132], 

                ['explanation' => "ウィメンズジーンズ","filepath" => "/images/W'jeans/A00335-900_F.jpg","product_id" => 133], 
                ['explanation' => "ウィメンズジーンズ","filepath" => "/images/W'jeans/A00346-AEK_FLAT.jpg","product_id" => 134], 
                ['explanation' => "ウィメンズジーンズ","filepath" => "/images/W'jeans/A00342-900_FLAT.jpg","product_id" => 135], 
                ['explanation' => "ウィメンズジーンズ","filepath" => "/images/W'jeans/A00391-135_FLAT.jpg","product_id" => 136], 
                ['explanation' => "ウィメンズジーンズ","filepath" => "/images/W'jeans/A00309-863_FLAT.jpg","product_id" => 137], 
                ['explanation' => "ウィメンズジーンズ","filepath" => "/images/W'jeans/A00333-900_FLAT.jpg","product_id" => 138], 
                ['explanation' => "ウィメンズジーンズ","filepath" => "/images/W'jeans/A00367-900_FLAT.jpg","product_id" => 139], 
                ['explanation' => "ウィメンズジーンズ","filepath" => "/images/W'jeans/A00404-BUR_F.jpg","product_id" => 140], 
                ['explanation' => "ウィメンズジーンズ","filepath" => "/images/W'jeans/A00385-228_FLAT.jpg","product_id" => 141], 
                ['explanation' => "ウィメンズジーンズ","filepath" => "/images/W'jeans/A00379-AUZ_FLAT.jpg","product_id" => 142], 
                ['explanation' => "ウィメンズジーンズ","filepath" => "/images/W'jeans/A00388-900_FLAT.jpg","product_id" => 143], 
                ['explanation' => "ウィメンズジーンズ","filepath" => "/images/W'jeans/B00317-AUZ_F.jpg","product_id" => 144], 

                ['explanation' => "ウィメンズショーツ","filepath" => "/images/W'shorts/CE0036-DF9_D.jpg","product_id" => 145], 
                ['explanation' => "ウィメンズショーツ","filepath" => "/images/W'shorts/CE0035-DFF_D.jpg","product_id" => 146], 
                ['explanation' => "ウィメンズショーツ","filepath" => "/images/W'shorts/AE0065-AEK_E.jpg","product_id" => 147], 
                ['explanation' => "ウィメンズショーツ","filepath" => "/images/W'shorts/CE0036-DF9_D.jpg","product_id" => 148], 
                ['explanation' => "ウィメンズショーツ","filepath" => "/images/W'shorts/CE0034-X92_D.jpg","product_id" => 149], 
                ['explanation' => "ウィメンズショーツ","filepath" => "/images/W'shorts/CE0034-900_D.jpg","product_id" => 150], 
                ['explanation' => "ウィメンズショーツ","filepath" => "/images/W'shorts/AE0064-900_E.jpg","product_id" => 151], 
                ['explanation' => "ウィメンズショーツ","filepath" => "/images/W'shorts/AE0064-AC6_E.jpg","product_id" => 152], 
                ['explanation' => "ウィメンズショーツ","filepath" => "/images/W'shorts/AE0063-900_F.jpg","product_id" => 153], 
                ['explanation' => "ウィメンズショーツ","filepath" => "/images/W'shorts/AE0061-100_F.jpg","product_id" => 154], 
                ['explanation' => "ウィメンズショーツ","filepath" => "/images/W'shorts/CE0027-AI3_D.jpg","product_id" => 155], 
                ['explanation' => "ウィメンズショーツ","filepath" => "/images/W'shorts/CE0028-DCT_D.jpg","product_id" => 156], 

                ['explanation' => "ウィメンズトラウザーズ","filepath" => "/images/W'trousers/AK0699-900_E.jpg","product_id" => 157], 
                ['explanation' => "ウィメンズトラウザーズ","filepath" => "/images/W'trousers/AK0691-A_V_E.jpg","product_id" => 158], 
                ['explanation' => "ウィメンズトラウザーズ","filepath" => "/images/W'trousers/AK0628-14L_E.jpg","product_id" => 159], 
                ['explanation' => "ウィメンズトラウザーズ","filepath" => "/images/W'trousers/AK0657-DBG_E.jpg","product_id" => 160], 
                ['explanation' => "ウィメンズトラウザーズ","filepath" => "/images/W'trousers/AK0670-902_E.jpg","product_id" => 161], 
                ['explanation' => "ウィメンズトラウザーズ","filepath" => "/images/W'trousers/AK0699-A_O_E.jpg","product_id" => 162], 
                ['explanation' => "ウィメンズトラウザーズ","filepath" => "/images/W'trousers/AK0700-900_E.jpg","product_id" => 163], 
                ['explanation' => "ウィメンズトラウザーズ","filepath" => "/images/W'trousers/AK0700-DG0_E.jpg","product_id" => 164], 
                ['explanation' => "ウィメンズトラウザーズ","filepath" => "/images/W'trousers/AK0735-AEI_E.jpg","product_id" => 165], 
                ['explanation' => "ウィメンズトラウザーズ","filepath" => "/images/W'trousers/AK0738-DCS_E.jpg","product_id" => 166], 
                ['explanation' => "ウィメンズトラウザーズ","filepath" => "/images/W'trousers/AK0748-BHM_E.jpg","product_id" => 167], 
                ['explanation' => "ウィメンズトラウザーズ","filepath" => "/images/W'trousers/AK0606-AZB_E.jpg","product_id" => 168], 


                
            ]);
    }
}
