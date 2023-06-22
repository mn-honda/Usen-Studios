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
        $users = User::all();
        // ユーザの数だけカートテーブルを作成
        // 合計金額の初期値は￥0
        foreach ( $users as $user ) {
            DB::table('carts')->insert([
                'user_id' => $user->id,
                'amount' => 0,
            ]);
        }
    }
}
