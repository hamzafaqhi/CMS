<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = ['name','price_in_value','price_in_percentage','valid_from','valid_till'];

        
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
