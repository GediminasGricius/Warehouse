<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\WarehouseController;
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
})->name('root');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/language/{lang}', [\App\Http\Controllers\LangController::class,'setLanguage'])->name('setLanguage');

Route::middleware(['auth'])->group(function(){
    Route::resource('warehouses', WarehouseController::class)->only(['index']);
    Route::resource('products', ProductController::class)->only(['index']);
});

Route::middleware(['auth','isAdmin', 'swearMiddleware'])->group(function (){
    Route::post('/products/search',[ProductController::class, 'search'])->name('products.search');
    Route::get('/products/search/reset',[ProductController::class, 'reset'])->name('products.search.reset');
    Route::post('/products/filter', [ProductController::class, 'filter'])->name('product.filter');
    Route::resource('warehouses', WarehouseController::class)->except(['index']);
    Route::resource('products', ProductController::class)->except(['index']);
});







