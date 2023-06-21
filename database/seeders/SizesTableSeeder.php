<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sizes')->insert(
            [
                ["size" => "XS"],
                ["size" => "S"],
                ["size" => "M"],
                ["size" => "L"],
                ["size" => "XL"],
            ]);
    }
}
