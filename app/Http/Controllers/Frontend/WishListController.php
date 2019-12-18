<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Wishlist;
use Session;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $wishlist = WishList::where('email',Auth::user()->email)->get();
            
            return view('Frontend.pages.wishlist',compact('wishlist'));
       
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
    public function store($id)
    {
        $product = Product::where('id',$id)->first();
        $wishlist_product = WishList::where('product_id',$id)->first();
        if(!empty($wishlist_product))
        {
            return response()->json(array("error" => "Product already added in wishlist"));
        }
        else
        {
            $email = Auth::user()->email;
            $wishlist = new Wishlist();
            $wishlist->product_id = $id;
            $wishlist->product_name = $product->name;
            $wishlist->price = $product->price;
            $wishlist->email = $email;
            $wishlist->save();
            return response()->json('Product Added to Wishlist');
        }
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
    public function destroyWish(Request $request)
    {
        $wishlist = Wishlist::where('email',Auth::user()->email)->where('product_id',$request->id)->delete();
        return 'true';
    }
}
