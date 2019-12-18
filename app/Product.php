<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Cart;

class Product extends Model
{
    protected $fillable = [
        'name','description','price','quantity',
        'meta_title','stock_status',
        'manufacture_id','length','width',
        'height','weight','sortorder','tag_id','category_id'
    ];

    public function categories()
    {
       return $this->belongsTo('App\Category');
    }

    public function tags()
    {
       return $this->hasMany('App\Tag');
    }
    
    public function manufactures()
    {
        return $this->hasMany('App\Manufacture');
    }

    public function product_relateds()
    {
        return $this->hasMany('App\Product_Related');
    }

    public function image_products()
    {
        return $this->hasMany('App\Image_Product','product_id');
    }
    
    public function discounts()
    {
        return $this->belongsTo('App\Discount');
    }

    public function carts()
    {
        return $this->belongsTo('App\Cart');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
    
    public static function getLatestProduct()
    {
        $latest = Product::where('stock_status','1')->where('sortorder','1')->orderBy('id','DESC')->take(10)->get();
        // dd($image_path);
        return $latest;
    }
    public static function getProduct()
    {
        $products = Product::where('stock_status',1)->orderBy('id','ASC')->take(10)->get();
        return $products;
    }

    public static function getUpsellProducts()
    {
        $cart_id = Order::where('status','processing')->orWhere('status','delivered')->pluck('cart_id');
        $cart_products_id = Cart::whereIn('session_id',$cart_id)->pluck('product_id');
        $upsell = Product::whereIn('id',$cart_products_id)->get();
        return $upsell;
    }
}
