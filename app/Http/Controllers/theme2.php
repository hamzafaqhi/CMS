<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class theme2 extends Controller
{
    //theme 2   
   public function abc() {
        Storage::disk('local')->put('file.txt', '2');
return view('pages.dashboard');     }
}
