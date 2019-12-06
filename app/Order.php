<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_code','status','payment_type','cart_id','address','city','province','country','first_name','last_name','post_code','phone','email','user_id'
    ];

    public function carts()
    {
        return $this->hasMany('App\Cart');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
