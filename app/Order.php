<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_code','status','payment_type','cart_id','address_id','user_id'
    ];

    public function carts()
    {
        $this->hasOne('App\Cart');
    }

    public function users()
    {
        $this->belongsTo('App\User');
    }
}
