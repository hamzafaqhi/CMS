<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function users()
    {
        $this->belongsTo('App\User');
    }
}
