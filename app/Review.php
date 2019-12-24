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

  public static function getRating($id)
  {
    $review = Review::where('product_id',$id)->get();
    if(count($review) > 1)
    {
      $sum_review = $review->sum->rating;
      $count_review = count($review);
      $rating = $sum_review / $count_review;
      return $rating;
    }
    elseif(count($review) == 1)
    {
      return $review->rating;
    }
    else
    {
      return 0;
    }
   
  }
}
