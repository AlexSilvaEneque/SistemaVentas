<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SaleController;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\App;
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
    Route::resource('purchases', PurchaseController::class)->except([
        'edit', 'update', 'destroy'
    ]);

    Route::get('purchases/pdf/{purchase}', [PurchaseController::class, 'pdf'])->name('purchases.pdf');

    // ruta para cargar imágenes
    Route::get('purchases/upload/{purchase}', [PurchaseController::class, 'upload'])->name('purchases.upload');

    // sales
    Route::resource('sales', SaleController::class)->except([
        'edit', 'update', 'destroy'
    ]);
    Route::get('sales/pdf/{sale}', [SaleController::class, 'pdf'])->name('sales.pdf');

    // business
    Route::resource('business', BusinessController::class)->only([
        'index', 'update'
    ]);

    // printer
    Route::resource('printers', PrinterController::class)->only([
        'index', 'update'
    ]);

    Route::get('change_status/products/{product}', [ProductController::class, 'status'])->name('products.status');
    Route::get('change_status/purchases/{purchase}', [PurchaseController::class, 'status'])->name('purchases.status');
    Route::get('change_status/sales/{sale}', [SaleController::class, 'status'])->name('sales.status');

    // Rutas para reportes de ventas
    Route::get('sales/reports_day', [ReportController::class, 'day'])->name('reports.day');

    Route::get('sales/reports_date', [ReportController::class, 'date'])->name('reports.date');

    Route::post('sales/reports_date', [ReportController::class, 'results'])->name('reports.results');
});
