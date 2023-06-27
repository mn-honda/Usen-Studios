<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function pickup(){
        $all_categories=Category::all();
        // dd($all_categories);
        return view('index', compact('all_categories'));
    }
}
