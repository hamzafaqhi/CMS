<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image_Product extends Model
{
    
    public function products()
    {
        return $this->belongsTo('App\Product','id');
    }
}
