<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    protected $fillable = [
        'name','image','description'
    ];
    
    public function products()
    {
        return $this->belongsTo('App\Product');
    }

    public static function getManufacturers()
    {
        $man = Manufacture::take(10)->get();
        return $man;
    }
}
