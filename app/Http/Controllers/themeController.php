<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Validator;
use Redirect;
use Datatables;

class themeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   
        return view('pages.theme');
    }


}
