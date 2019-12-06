<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'product_id','rating','reviews','user_id','approved'
    ];

    public function users()
  {
    return $this->belongsTo('App\User');
  }

  public function products()
  {
    return $this->belongsTo('App\Product');
  }
}
