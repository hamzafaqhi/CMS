<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','author'
    ];
    protected $dates= ['created_at'];
}
