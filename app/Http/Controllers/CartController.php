<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class CartController extends Controller
{
    public function index() {
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);
        return view('user.cart.index', compact('user'));
    }

    public function update() {
    }

    public function delete() {
    }

}
