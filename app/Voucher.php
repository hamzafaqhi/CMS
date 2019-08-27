<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = ['name','price_in_value','price_in_percentage','valid_from','valid_till','date_used'];

    
    public function carts()
    {
        $this->belongsTo('App\Cart');
    }

}
