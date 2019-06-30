<?php
use App\Http\Controllers\CategoryController;

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

Route::get('/Dashboard','DashboardController@index')->name('dashboard');
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

 
