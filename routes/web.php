<?php

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
    return view('auth.login');
});

Route::get('/home', function () {
    return view('HomePage');
});

Route::get('/stocklist', function () {
    return view('StockList');
});

Route::get('/addproduct', function () {
    return view('AddProductForm');
});

Route::get('/api/gethargaproduk',[App\Http\Controllers\APIController::class, 'gethargaproduk'])->name('gethargaproduk');

Route::post('/api/orderproduk',[App\Http\Controllers\APIController::class, 'orderproduk'])->name('orderproduk');

Route::get('/stocklist',[App\Http\Controllers\ProductController::class, 'product'])->name('stocklist');

Route::get('/api/login',[App\Http\Controllers\APIController::class, 'login'])->name('login');
Route::post('/api/login',[App\Http\Controllers\APIController::class, 'login'])->name('loginpost');

Route::post('/api/register',[App\Http\Controllers\APIController::class, 'registerMobile'])->name('registermobile');

Route::get('/productform',[App\Http\Controllers\ProductController::class, 'form'])->name('productform');
Route::post('/productform',[App\Http\Controllers\ProductController::class, 'addProduct'])->name('addproduct');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
