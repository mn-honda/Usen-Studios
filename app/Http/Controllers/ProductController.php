<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Image;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list_fits_category(Request $request,$category_id){
        $products = Product::where("category_id","=",$category_id)->whereGender("メンズ")->get();
        //dd($products);
        return view("product.products_list",compact("products"));
    }

    public function product_detail($product_id){
        $product_detail = Product::where("id","=",$product_id)->get();
        
        return view("product.product_detail",compact("product_detail"));
    }
}

