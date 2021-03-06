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
    return view('welcome');
});
Route::prefix('administrator')->group(function (){
    Route::get('/','App\Http\Controllers\Backend\MainController@mainpage');
    Route::resource('discounts','App\Http\Controllers\Backend\DiscountController');
    Route::resource('products','App\Http\Controllers\Backend\ProductController');
});
