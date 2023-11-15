<?php

use App\Http\Controllers\AdminHomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;

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
Route::resource('products', ProductController::class);
Route::get('login', 'App\Http\Controllers\LoginController@index');
Route::group(['middleware' => ['CheckUser']], function () {
    //Route::get('admin', 'AdminHomeController@index');
    Route::resource('products', ProductController::class);
});
