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
    Route::post('/{id}/good', 'goodvalueController@store')->name('good');
    Route::delete('/{id}/deletegoods', 'goodvalueController@destroy')->name('deletegoods');
});

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::post('/store', 'userController@store')->name('store');
    Route::get('/create', 'userController@create')->name('create');
});

Route::group(['prefix' => 'review', 'as' => 'review.'], function () {
    Route::post('/{id}/store', 'reviewController@store')->name('store');
    Route::get('/{id}/create', 'reviewController@create')->name('create');
    Route::put('/{id}/update', 'reviewController@update')->name('update');
    Route::get('/{id}/edit', 'reviewController@edit')->name('edit');
    Route::delete('/{id}/destroy', 'reviewController@destroy')->name('destroy');
});

Route::group(['prefix' => 'board', 'as' => 'board.'], function () {
    Route::get('/', 'boardController@index')->name('index');
    Route::get('/{id}', 'boardController@show')->name('show');
});

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('/reviews', 'dashboardController@reviews')->name('reviews');
    Route::get('/goods', 'dashboardController@goods')->name('goods');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
