<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dash', function () {
    return view('layouts.admin');
})->name('dash');

Route::group(['middleware' => ['auth:sanctum']], function () {
    // categories
    Route::resource('categories', CategoryController::class);

    // clients
    Route::resource('clients', ClientController::class);

    // products
    Route::resource('products', ProductController::class);

    // providers
    Route::resource('providers', ProviderController::class);

    // purhcases
    Route::resource('purchases', PurchaseController::class);

    // sales
    Route::resource('sales', SaleController::class);
});
