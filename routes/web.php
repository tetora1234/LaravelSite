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

Route::get('/', 'HomeController@index')->name('index');

Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
  Route::get('/', 'productController@index')->name('index');
  Route::get('/{id}', 'productController@show')->name('show');
  Route::get('/{id}/read', 'productController@read')->name('read');
});
