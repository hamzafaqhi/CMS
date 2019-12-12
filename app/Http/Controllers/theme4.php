<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class theme4 extends Controller
{
    //theme 4   
   public function index() {
        Storage::disk('local')->put('file.txt', '4');
return view('pages.dashboard');     }
}
