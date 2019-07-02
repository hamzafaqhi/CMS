<?php
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
    return view('pages.dashboard');
});

Route::get('/dashboard','DashboardController@index')->name('dashboard');
Route::get('/invoice','DashboardController@invoice')->name('invoice');
//Category
Route::get('/category','CategoryController@index')->name('category.index');
    Route::post('/category/add','CategoryController@store');
    Route::get('/category/create','CategoryController@create')->name('category.create');
    Route::delete('/category/{id}/delete','CategoryController@destroy');
    Route::get('/category/{id}/edit','CategoryController@edit');
    Route::post('category/update','CategoryController@update');

//Product
Route::get('/product','ProductController@index')->name('product.index');
Route::get('/product/create','ProductController@create')->name('product.create');
Route::post('/product/add','ProductController@store');
Route::delete('/product/{id}/delete','ProductController@destroy');
Route::post('product/update','ProductController@update');
Route::get('/product/{id}/edit','ProductController@edit')->name('products.edit');

//Manufacture
Route::get('/manufacture','ManufactureController@index')->name('manu.index');
Route::get('/manufacture/create','ManufactureController@create')->name('manu.create');
Route::post('/manu/add','ManufactureController@store');
Route::delete('/manu/{id}/delete','ManufactureController@destroy');
Route::get('/manu/{id}/edit','ManufactureController@edit')->name('manu.edit');
Route::post('manu/update','ManufactureController@update');


 
