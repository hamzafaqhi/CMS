<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    protected $fillable = [
        'name','image'
    ];
    
    public function products()
    {
        $this->belongsTo('App\Product');
    }
}
