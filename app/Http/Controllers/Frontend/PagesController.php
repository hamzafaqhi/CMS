<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Manufacture;
use App\Product;
use App\Review;
use App\Banner;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::where('status',1)->latest()->get();
        $latest = Product::getLatestProduct();
        $products = Product::getProduct();
        $cat = Category::getCategory();
        $man = Manufacture::getManufacturers();
        return view('Frontend.pages.homepage',compact('latest','products','cat','man','banner'));
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

    public function review(Request $request)
    {
        
        if(empty(Auth::check()))
        {
            return response()->json(array("info" => "login"));
        }
        else
        {
            $user_id = Auth::user()->id;
            $review_exist = Review::where('product_id',$request->id)->where('user_id',$user_id)->first();
            if(!empty($review_exist))
            {
                return response()->json(array("error" => "Product already reviewed"));
            }
            else
            {
                $user_id = Auth::user()->id;
                $review = new Review();
                $review->approved = '1';
                $review->product_id = $request->id;
                if($request->has('rating'))
                {
                    $review->rating = $request->rating;
                }
                if($request->has('review'))
                {
                    $review->review = $request->review;
                }
                $review->save();
                return response()->json('Product reviewed');
            }
        }
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
