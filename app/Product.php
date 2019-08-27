<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','description','price','quantity',
        'meta_title','stock_status',
        'manufacture_id','length','width',
        'height','weight','sortorder','tag_id','category_id'
    ];

    public function categories()
    {
        $this->belongsTo('App\Category');
    }

    public function tags()
    {
        $this->hasMany('App\Tag');
    }
    
    public function manufactures()
    {
        $this->hasMany('App\Manufacture');
    }
    
    public function discounts()
    {
        $this->belongsTo('App\Discount');
    }

    public function carts()
    {
        $this->belongsTo('App\Cart');
    }
}
