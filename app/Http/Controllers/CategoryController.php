<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function pickup(){
        $all_categories=category::all();
        return view('pickup', compact('all_categories'));
    }    
}
