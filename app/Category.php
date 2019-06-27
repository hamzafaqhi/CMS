<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','author','description'
    ];
    protected $dates= ['created_at'];

    public function products()
    {
        $this->hasMany('App\Product');
    }
}
