<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','author','description','sortorder'
    ];
    protected $dates= ['created_at'];

    public function products()
    {
       return $this->hasMany('App\Product','category_id');
    }
    public function categories()
    {
       return $this->hasMany('App\Category','parent_id');
    }
    public static function getCategory()
    {
        $cat = Category::where('sortorder','1')->orderBy('id','DESC')->take(4)->get();
        return $cat;
    }
}
