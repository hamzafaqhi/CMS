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

Route::get('/category','CategoryController@index')->name('category.index');
    Route::post('/category/add','CategoryController@store');
    Route::get('/category/create','CategoryController@create')->name('category.create');
    Route::get('/category/{id}','CategoryController@destroy');
    Route::get('/category/{id}/edit','CategoryController@edit');

 
