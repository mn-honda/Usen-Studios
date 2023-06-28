<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InquiriesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// 奥田さん
Route::get('admin/product_register', [AdminController::class, 'product'])->middleware('auth'); 
Route::get('admin/stock_list', [adminController::class, 'stock_list'])->middleware('auth'); 
Route::get('admin/purchase_register', [AdminController::class, 'purchase_product'])->middleware('auth'); 
Route::get('admin/purchase_list', [adminController::class, 'purchase_list'])->middleware('auth'); 
Route::post('admin/product_register', [AdminController::class, 'product_register'])->middleware('auth'); 
Route::post('admin/purchase_register', [AdminController::class, 'purchase_register'])->middleware('auth'); 
Route::get('admin/edit_purchase/{id}', [AdminController::class, 'edit_purchase'])->middleware('auth'); 
Route::post('admin/edit_purchase/{id}', [AdminController::class, 'edit_purchase'])->middleware('auth'); 
Route::post('admin/update_purchase/{id}', [AdminController::class, 'update_purchase'])->middleware('auth'); 
Route::post('admin/purchase_list', [AdminController::class, 'delete_purchase'])->middleware('auth'); 
Route::get('admin/sale_list', [AdminController::class, 'sale_list'])->middleware('auth'); 
Route::post('admin/sale_list', [AdminController::class, 'sale_deliveried'])->middleware('auth'); 
Route::get('user/list', [SaleController::class, 'list'])->middleware('auth');
Route::get('user/edit_user', [SaleController::class, 'edit_user'])->middleware('auth');
Route::post('user/edit_user', [SaleController::class, 'update_user'])->middleware('auth');

//平西
// カート画面
Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
Route::post('/cart/add', [CartController::class, 'add'])->middleware('auth');
Route::post('/cart/update', [CartController::class, 'update'])->middleware('auth');
Route::post('/cart/delete/{id}', [CartController::class, 'delete'])->middleware('auth');
// クレカ登録画面
Route::get('/sale/registration_credit', [SaleController::class, 'registration_credit'])->middleware('auth');
Route::post('/sale/registration_credit', [SaleController::class, 'registration_credit_into_stripe'])->middleware('auth');
// 購入画面
Route::get('/sale/confirm', [SaleController::class, 'confirm'])->middleware('auth');
Route::post('/sale/procedure', [SaleController::class, 'procedure'])->middleware('auth');
Route::get('/sale/complete/{id}', [SaleController::class, 'complete'])->middleware('auth');


// 佐々木
Route::get("/product/{id}",[ProductController::class, 'list_fits_category']);
Route::get("/product",[ProductController::class, 'list_fits_word']);
Route::get("/product_detail/{id}",[ProductController::class, 'product_detail']);
Route::post("/index",[CategoryController::class, 'pickup'])->middleware('auth');
Route::post("/inquiry",[InquiriesController::class, 'send_inquiry'])->middleware('auth');
Route::get("/inquiry",function(){
    return view("/user/contact/inquiry");
})->middleware('auth');

// ほんだ　
Route::get("/index",[CategoryController::class, 'pickup']);

require __DIR__.'/auth.php';
