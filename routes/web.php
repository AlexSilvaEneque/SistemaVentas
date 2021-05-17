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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('auth.login');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dash', function () {
//     return view('layouts.admin');
// })->name('dash');

// categories
Route::get('categories', [CategoryController::class, 'index'])->name('category.index');

Route::get('categories/create', [CategoryController::class, 'create'])->name('category.create');

Route::post('categories', [CategoryController::class, 'store'])->name('category.store');

Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');

Route::put('categories/{category}', [CategoryController::class, 'update'])->name('category.update');

Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

// clients
Route::get('clients', [ClientController::class, 'index'])->name('client.index');

Route::get('clients/create', [ClientController::class, 'create'])->name('client.create');

Route::post('clients', [ClientController::class, 'store'])->name('client.store');

Route::get('clients/{client}', [ClientController::class, 'show'])->name('client.show');

Route::get('clients/{client}/edit', [ClientController::class, 'edit'])->name('client.edit');

Route::put('clients/{client}', [ClientController::class, 'update'])->name('client.update');

Route::delete('clients/{client}', [ClientController::class, 'destroy'])->name('client.destroy');

// products
Route::get('products', [ProductController::class, 'index']);

// providers
Route::get('providers', [ProviderController::class, 'index']);

// purhcases
Route::get('purchases', [PurchaseController::class, 'index']);

// sales
Route::get('sales', [SaleController::class, 'index']);








// Route::resource('categories', 'CategoryController')->names('categories');
// Route::resource('clients', 'ClientController')->names('clients');
// Route::resource('products', 'ProductController')->names('products');
// Route::resource('providers', 'ProviderController')->names('providers');
// Route::resource('purchases', 'PurchaseController')->names('purchases');
// Route::resource('sales', 'SaleController')->names('sales');

Route::get('/prueba', function () {
    return view('prueba');
});

// Route::get('/cate', function () {
//     return view('admin.categories.index');
// });

// Route::get('cursos', [CursoController::class, 'index'])->name('cursos.index');
