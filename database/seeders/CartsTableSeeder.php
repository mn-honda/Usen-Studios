<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class CartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_length = User::all()->count();
        for ( $user_id = 1; $user_id < $user_length; $user_id++ ) {
            DB::table('carts')->insert([
                'user_id' => $user_id,
                'amount' => 0,
            ]);
        }
    }
}
