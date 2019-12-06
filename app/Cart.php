<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Cart extends Model
{
    protected $fillable = [
        'product_id','product_name','price','coupon_code','status','quantity','session_id','user_email'
    ];


    public function vouchers()
    {
        return $this->hasMany('App\Voucher');
    }

    public function orders()
    {
        return $this->belongsTo('App\Order');
    }

    public static function getCart($session_id)
    {

        $cart_items = Cart::where('session_id',$session_id)->where('status',1)->get();
        $total_price = $cart_items->sum->total_price;
        $count = $cart_items->count();
        Session::put('cart_items', $count);
        Session::put('total_price', $total_price);
        return $cart_items;
    }
}
