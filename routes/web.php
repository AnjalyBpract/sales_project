<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ProfitReportController;
use App\Http\Controllers\AjaxController;
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

// require __DIR__.'/auth.php';

Route::resource('vendors', VendorController::class);
Route::resource('customers', CustomerController::class);
Route::resource('product_categories', ProductCategoryController::class);
 Route::resource('products', ProductController::class);
Route::resource('/sales', SaleController::class);

//  Route::post('/get_product',[SaleCRUDController::class, 'product'])->name('get_product');;
//  Route::post('/get_rate',[SaleCRUDController::class,'rate'])->name('get_rate');


 Route::resource('purchases', PurchaseController::class);
 Route::post('/get_product',[AjaxController::class, 'product'])->name('get_product');;
 Route::post('/get_saleprice',[AjaxController::class, 'saleprice'])->name('get_saleprice');;
Route::post('/get_rate',[AjaxController::class,'rate'])->name('get_rate');
Route::get('/profitreport',[ProfitReportController::class,'index'])->name('profitreport');
Route::get('/report-result',[ProfitReportController::class,'report'])->name('report');




// Route::post('/get')



// Route::get('/profit', function () {
//     return view('profitreport.create');
// });



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
