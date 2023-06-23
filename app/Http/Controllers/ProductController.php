<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Image;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list_fits_category(Request $request,$category_id){
        $products = Product::where("category_id","=",$category_id)->whereGender($request->gender)->get();
        $category = Category::findOrFail($category_id);
        //dd($products);
        return view("product.products_list",compact("products","category"));
    }

    public function product_detail($product_id){
        $product_detail = Product::where("id","=",$product_id)->get();
        
        return view("product.product_detail",compact("product_detail"));
    }
}

