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
Route::group(['middleware' => 'adminlogin'], function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});


Route::group([ 'prefix' => 'admin','middleware' => ['auth', 'checkrole']], function () {
Route::get('/dashboard','DashboardController@index')->name('dashboard');
Route::get('/setting','SettingsController@index')->name('setting');
Route::get('/edit/settings/{id}','SettingsController@edit')->name('settings.edit');
Route::post('update/setting','SettingsController@update')->name('setting-update');

Route::get('/order','OrderController@index')->name('order');
Route::get('/returns','OrderController@returns')->name('returns');
Route::get('/cancel','OrderController@cancel')->name('cancel');
Route::get('/order/{id}/invoice','OrderController@invoice')->name('order.invoice');
Route::get('/redirect/view/{status}','OrderController@redirectView')->name('view-redirect');

Route::get('/dashboard/{id}',function($id){
echo "                                                                                                           YOU HAVE SELECTED THEME  ".$id.". PLEASE REFRESH YOUR WEBSITE TO SEE THE CHANGES!!";
if($id=='1'){        
    Storage::disk('local')->put('file.txt', '1');
    return back()->with('success', 'Theme Changed Successfully');

}
elseif($id=='2') 
{        
    Storage::disk('local')->put('file.txt', '2');
  return back()->with('success', 'Theme Changed Successfully');

}

elseif($id=='3') {        Storage::disk('local')->put('file.txt', '3');
    return back()->with('success', 'Theme Changed Successfully');}
elseif($id=='4') {        Storage::disk('local')->put('file.txt', '4');
    return back()->with('success', 'Theme Changed Successfully');}
elseif($id=='5') {        Storage::disk('local')->put('file.txt', '5');
    return back()->with('success', 'Theme Changed Successfully');}
elseif($id=='6') {        Storage::disk('local')->put('file.txt', '6');
    return back()->with('success', 'Theme Changed Successfully');}
elseif($id=='7') {        Storage::disk('local')->put('file.txt', '7');
    return back()->with('success', 'Theme Changed Successfully');}

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
Route::post('/product/image-delete','ProductController@deleteProductImage');
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

Route::get('/banner','BannerController@index')->name('banner');
Route::get('/banner/create','BannerController@create')->name('banner.create');
Route::post('/banner/add','BannerController@store');
Route::get('/ban/{id}/edit','BannerController@edit')->name('ban.edit');
Route::delete('/ban/{id}/delete','BannerController@destroy');
Route::post('ban/update','BannerController@update');
// Route::get('ban/get','BannerController@getBanners');

Route::get('/pages','CMSPagesController@index')->name('pages');
Route::get('/page/create','CMSPagesController@create')->name('create-page');
Route::post('/page/add','CMSPagesController@store');
Route::delete('/page/{id}/delete','CMSPagesController@destroy');
Route::get('/page/{id}/edit','CMSPagesController@edit')->name('page.edit');
Route::post('page/update','CMSPagesController@update');

Route::get('/newsletter','NewsLetterController@index')->name('news.index');
Route::get('/news/{id}/delete','NewsLetterController@destroyNewsletter')->name('delete.news');

Route::get('/users','UserController@index')->name('users');
Route::get('/profile/{id}','UserController@show')->name('profile');
Route::get('/users/admin','UserController@getAdmin')->name('admin.users');
Route::post('/user/update','UserController@updateRole')->name('users.role');
Route::post('/user/edit','UserController@update')->name('users.update');
Route::post('/user/deactivate','UserController@deactivateUser')->name('deactivate');
Route::post('/user/activate','UserController@activateUser')->name('activate');



Route::get('/logout','Auth\LoginController@logout')->name('logout');

Route::get('/maintenance','DashboardController@maintenance')->name('maintenance');
Route::get('/maintenance/on','DashboardController@maintenanceOn')->name('maintenance-on');
Route::get('/maintenance/off','DashboardController@maintenanceOff')->name('maintenance-off');

});








Route::match(['get', 'post'], '/page/{url}', 'CMSPagesController@cmsPage');




// Route::get('/home', 'HomeController@index')->name('home');
//Frontend
Route::match(['GET', 'POST'],'/home','Frontend\PagesController@index')->name('homepage');
Route::match(['GET', 'POST'],'/shop','Frontend\ShopController@index')->name('shoppage');
Route::get('/contact','Frontend\PagesController@contact')->name('contactuspage');
Route::get('/about','Frontend\PagesController@about')->name('aboutuspage'); 
Route::post('cat/{id}/products','Frontend\PagesController@index')->name('search_pro_cat');
Route::get('/show/{id}/product/','Frontend\PagesController@showProduct')->name('showproduct');

Route::get('/search/{id}/{tag}','Frontend\ShopController@index')->name('search_cat');
Route::any('/search/products','Frontend\ShopController@index')->name('search_products');
// Route::get('/tag-search/{tag}','Frontend\ShopController@index')->name('search_tag');
Route::get('single/product/{id}','Frontend\ShopController@singleProduct')->name('single_product');

Route::get('/cart','Frontend\CartController@index')->name('cartpage');
Route::get('/add/{id}/cart/','Frontend\CartController@store')->name('addcart');
Route::get('/update/cart','Frontend\CartController@updateCart')->name('updateproduct');
Route::get('/delete/{id}/cart','Frontend\CartController@destroyCart')->name('destroycart');
Route::get('/user-account','Frontend\Auth\UserController@userAccount')->name('useraccount');
Route::post('/vouch/add','Frontend\CartController@addVoucher')->name('voucheradd');



//Route::match(['get', 'post'], '/add/cart/', ['uses' => 'Frontend\CartController@store', 'as' => 'addcart']);
Route::group(['middleware' => 'FrontLogin'], function () {
    Route::get('/my-account','Frontend\Auth\UserController@index')->name('myaccountpage');
    Route::post('/login-user','Frontend\Auth\UserController@login')->name('login_user'); 
    Route::post('/reg-user','Frontend\Auth\UserController@register')->name('reg_user');
         
});
Route::post('/password-reset','Frontend\Auth\UserController@resetPassword')->name('password-reset');
Route::post('/update-details','Frontend\Auth\UserController@updateUserDetails')->name('update_user');
Route::get('/logout-user','Frontend\Auth\UserController@logout')->name('logout_user');

Route::post('/review','Frontend\PagesController@review')->name('review');


Route::group(['middleware' => 'user'], function () {
    Route::get('/wishlist','Frontend\WishListController@index')->name('wishlistpage');
    Route::get('/add/{id}/wish/','Frontend\WishListController@store')->name('addwish');
    Route::get('/delete/{id}/wish','Frontend\WishListController@destroyWish')->name('destroywish');
    Route::get('/checkout','Frontend\CheckoutController@index')->name('checkoutpage');
    Route::post('/create-order','Frontend\CheckoutController@store')->name('create-order'); 
    Route::get('/order/{id}/cancel','Frontend\CheckoutController@cancelOrder')->name('cancel-order');
    Route::get('/order/{id}/return','Frontend\CheckoutController@returnOrder')->name('return-order');

});

Route::post('/subscribe/newsletter','NewsLetterController@store');