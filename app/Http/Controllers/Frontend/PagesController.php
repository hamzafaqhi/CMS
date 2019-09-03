<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latest = Product::getLatestProduct();
        $products = Product::getProduct();
        return view('Frontend.pages.homepage',compact('latest','products'));
    }

    public function shop()
    {
        return view('Frontend.pages.shop');
    }

    public function cart()
    {
        return view('Frontend.pages.cart');
    }

    public function checkout()
    {
        return view('Frontend.pages.checkout');
    }

    public function wishlist()
    {
        return view('Frontend.pages.wishlist');
    }

    public function contact()
    {
        return view('Frontend.pages.contact');
    }

    public function about()
    {
        return view('Frontend.pages.about');
    }

    public function account()
    {
        return view('Frontend.pages.myaccount');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
