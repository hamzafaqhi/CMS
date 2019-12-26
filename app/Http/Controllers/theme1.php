<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use File;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class theme1 extends Controller
{
    //theme 1   
   public function index() {
   	
return view('pages.dashboard');     }
}
