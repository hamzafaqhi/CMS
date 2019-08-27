<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'total_price','coupen_id','status'
    ];

    
    public function vouchers()
    {
        $this->hasMany('App\Voucher');
    }

    public function orders()
    {
        $this->belongsTo('App\Order');
    }
}
