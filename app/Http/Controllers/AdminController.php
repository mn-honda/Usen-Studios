<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Image;
use App\Models\Purchase;
use App\Models\Stock;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function product_register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'category' => ['required'],
            'image_front' => 'required|max:1024|mimes:jpg,jpeg,png,gif',
            'image_back' => 'required|max:1024|mimes:jpg,jpeg,png,gif',
        ]);
        $file_path = $request->image_front->store('images', 'public');
        $file_path = $request->image_back->store('images', 'public');

        //if ($request->has('send')) {
            $new_products = new Product();
            $new_images1 = new Image();
            $new_images2 = new Image();
            $new_stocks = new Stock();

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

            $new_stocks->product_id = $new_products->id;
            $new_stocks->stock = "0";

            $new_stocks->save();

        //return redirect('admin/product_register');
        //}
      return view('admin/product_register', compact('request'));
    }

    public function purchase_product()
    {
        $products = Product::all();

        return view('admin/purchase_register', compact('products'));
    }

    public function purchase_register(Request $request)
    {
        $new_purchases = new Purchase();

        $new_purchases->product_id = $request->product;
        $new_purchases->quantity = $request->quantity;
        $new_purchases->date = $request->date;

        $new_purchases->save();

        $stocks = Stock::whereProduct_id($request->product)->first();

        $stocks->stock = $request->input('quantity');

        $stocks->save();

        return redirect('admin/purchase_register');
    }

    public function purchase_list()
    {
        $purchases = Purchase::all();

        return view('admin/purchase_list', compact('purchases'));
    }

    public function stock_list()
    {
        $stocks = stock::all();

        return view('admin/stock_list', compact('stocks'));
    }
}
