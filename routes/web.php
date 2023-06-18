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

Route::get('/HomePage', function () {
    return view('HomePage');
});

Route::get('/stocklist', function () {
    return view('StockList');
});

/*
Route::get('/login', function () {
    return view('Login');
}); */

/*
Route::get('/register', function () {
    return view('Register');
}); */

//Route::post('/register', 'FormController@submit' );


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
