<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Image;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function product_register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'category' => ['required'],
        ]);

        //if ($request->has('send')) {
            $new_products = new Product();
            $new_images1 = new Image();
            $new_images2 = new Image();

            $new_products->name = $request->name;
            $new_products->category_id = $request->category;
            $new_products->gender = $request->gender;
            $new_products->price = $request->price;
            $new_products->release_date = $request->release_date;
            $new_products->detail = $request->detail;

            $new_products->save();

            $new_images1->filepath = $request->image_front;
            $new_images1->explanation = "前面";
            $new_images1->product_id = $new_products->id;
            $new_images2->filepath = $request->image_back;
            $new_images2->explanation = "背面";
            $new_images2->product_id = $new_products->id;

            $new_images1->save();
            $new_images2->save();

        //return redirect('admin/product_register');
        //}
      return view('admin/product_register', compact('request'));
    }
}
