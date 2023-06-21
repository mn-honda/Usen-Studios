<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
Route::get('admin/product_register', function(){
    return view('admin.product_register');
})->middleware('auth');
Route::get('admin/stock_list', function(){
    return view('admin.stock_list');
})->middleware('auth');
Route::get('admin/purchase_register', function(){
    return view('admin.purchase_register');
})->middleware('auth');
Route::get('admin/purchase_list', function(){
    return view('admin.purchase_list');
})->middleware('auth');
Route::post('admin/product_register', [AdminController::class, 'product_register'])->middleware('auth');
Route::post('admin/purchase_register', [AdminController::class, 'purchase_register'])->middleware('auth');


// 平西君
Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
Route::post('/cart/update', [CartController::class, 'update'])->middleware('auth');
Route::post('/cart/delete/{id}', [CartController::class, 'delete'])->middleware('auth');
Route::get('/sale/confirm', [SaleController::class, 'index'])->middleware('auth');
Route::get('/sale/complete', [SaleController::class, 'complete'])->middleware('auth');


require __DIR__.'/auth.php';
