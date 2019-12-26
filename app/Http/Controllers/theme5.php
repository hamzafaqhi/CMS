<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class theme5 extends Controller
{
    //theme 5   
   public function index() {
        Storage::disk('local')->put('file.txt', '5');
return view('pages.dashboard');     }
}
