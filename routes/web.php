<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Product_categoryCURDController;
use App\Http\Controllers\ProductCRUDController;
use App\Http\Controllers\SaleCRUDController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');

})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Route::resource('vendors', VendorCRUDController::class);
Route::resource('product_categories', Product_categoryCURDController::class);
Route::resource('products', ProductCRUDController::class);
Route::resource('transactions', SaleCRUDController::class);

Route::post('api/fetch-product_categories',[SaleCRUDController::class, 'fetchProduct_category']);


Route::resource('vendors', VendorController::class);
Route::resource('customers', CustomerController::class);
