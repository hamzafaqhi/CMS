<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = ['name','amount','amount_type','expiry_date','status'];

    protected $dates = ['expiry_date'];
    
    public function carts()
    {
        return $this->belongsTo('App\Cart');
    }

}
