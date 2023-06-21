<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert(
            [
                ['name' => "アウター"], 
                ['name' => "スウェット"], 
                ['name' => "ニット"], 
                ['name' => "Tシャツ"], 
                ['name' => "ジーンズ"], 
                ['name' => "ショーツ"], 
                ['name' => "トラウザーズ"], 
            ]);
    }
}
