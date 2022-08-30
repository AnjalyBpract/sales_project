<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Product_categoryCURDController;
use App\Http\Controllers\ProductCRUDController;
use App\Http\Controllers\SaleCRUDController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ProfitReportController;
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

Route::resource('vendors', VendorController::class);
Route::resource('customers', CustomerController::class);
Route::resource('product_categories', Product_categoryCURDController::class);
 Route::resource('products', ProductCRUDController::class);
Route::resource('/sales', SaleCRUDController::class);

 Route::post('/get_product',[SaleCRUDController::class, 'product'])->name('get_product');;
 Route::post('/get_rate',[SaleCRUDController::class,'rate'])->name('get_rate');


 Route::resource('purchases', PurchaseController::class);
 Route::post('/get_product',[PurchaseController::class, 'product'])->name('get_product');;
 Route::post('/get_rate',[PurchaseController::class,'rate'])->name('get_rate');

// Route::post('/get')



// Route::get('/profit', function () {
//     return view('profitreport.create');
// });

Route::get('/profitreport',[ProfitReportController::class,'index'])->name('profitreport');

Route::get('/report',[ProfitReportController::class,'report'])->name('report');
// Route::post('/profitreport',[ProfitReportController::class,'report']);


