<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','description','price','quantity',
        'meta_title','image','stock_status',
        'manufacture_id','length','width',
        'height','weight','sortorder'
    ];

    public function categories()
    {
        $this->belongsTo('App\Category');
    }
}
