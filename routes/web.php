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

// Route::get('/dashboard','StudViewControlle@index');


//  Route::get('view-records','StudViewControlle@index');

Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});


Route::get('/dashboard/{id}',function($id){
echo "                                                                                                           YOU HAVE SELECTED THEME  ".$id.". PLEASE REFRESH YOUR WEBSITE TO SEE THE CHANGES!!";
if($id=='1'){        Storage::disk('local')->put('file.txt', '1');}
elseif($id=='2') {        Storage::disk('local')->put('file.txt', '2');}

elseif($id=='3') {        Storage::disk('local')->put('file.txt', '3');}
elseif($id=='4') {        Storage::disk('local')->put('file.txt', '4');}
elseif($id=='5') {        Storage::disk('local')->put('file.txt', '5');}
elseif($id=='6') {        Storage::disk('local')->put('file.txt', '6');}
elseif($id=='7') {        Storage::disk('local')->put('file.txt', '7');}

})->name('theem');

Route::get('/dashboard','DashboardController@index')->name('dashboard');
//controller path
Route::get('/theme','themeController@index')->name('theme.index');


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
Route::post('/product/add','ProductController@store')->name('productsave');
Route::post('/product/image-upload','ProductController@saveProductImage');
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

//Voucher
Route::get('/voucher','VoucherController@index')->name('vouchers');
Route::get('/voucher/create','VoucherController@create')->name('voucher.create');
Route::post('/voucher/add','VoucherController@store');
Route::delete('/voucher/{id}/delete','VoucherController@destroy');
Route::get('/voucher/{id}/edit','VoucherController@edit')->name('voucher.edit');
Route::post('voucher/update','VoucherController@update');

//Tags
Route::get('/tags','TagController@index')->name('tags');
Route::get('/tags/create','TagController@create')->name('tags.create');
Route::post('/tags/add','TagController@store');
Route::delete('/tags/{id}/delete','TagController@destroy');
Route::get('/tags/{id}/edit','TagController@edit')->name('tags.edit');
Route::post('tags/update','TagController@update');

Route::get('/logout','Auth\LoginController@logout')->name('logout');

// Route::get('/home', 'HomeController@index')->name('home');
//Frontend
Route::get('/home','Frontend\PagesController@index')->name('homepage');
Route::get('/shop','Frontend\PagesController@shop')->name('shoppage');
Route::get('/cart','Frontend\PagesController@cart')->name('cartpage');
Route::get('/checkout','Frontend\PagesController@checkout')->name('checkoutpage');
Route::get('/wishlist','Frontend\PagesController@wishlist')->name('wishlistpage');
Route::get('/contact','Frontend\PagesController@contact')->name('contactuspage');
Route::get('/about','Frontend\PagesController@about')->name('aboutuspage'); 
Route::get('/my-account','Frontend\PagesController@account')->name('myaccountpage'); 
