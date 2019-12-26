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
    public function index($id = null)
    {
        if(request()->isMethod('POST'))
        {
            if(!empty($id))
            { 
                $products = Product::where('stock_status',1)->where('category_id',$id)->orderBy('id','ASC')->take(10)->get();
            }
        }
        else
        {
            $products = Product::getProduct();
        }
        $banner = Banner::where('status',1)->latest()->get();
        $latest = Product::getLatestProduct();
        $cat = Category::getCategory();
        $man = Manufacture::getManufacturers(); 
        return view('Frontend.pages.homepage',compact('latest','products','cat','man','banner'));
        // $latest = Product::getLatestProduct();
        // $products = Product::getProduct();
        return view('Frontend.pages.homepage',compact('latest','products'));
    }

    public function showProduct($id)
    {
        $product = Product::with('image_products')->where('id',$id)->first();
        if(count($product->image_products) > 0)
        {
            $image = explode(',' , $product->image_products[0]->image_path)[0];
        }
        else
        {
            $image =  "";
        }
        $result  = array();
        $result['data'] = $product;
        $result['image'] = $image;
        return json_encode($result); 
    }

    // public function getPro($id)
    // {
    //     if(request()->ajax())
    //     {
    //         $products = Product::with('image_products')->where('stock_status',1)->where('category_id',$id)->orderBy('id','ASC')->take(10)->get();
    //         if(count($products->image_products) > 0)
    //         {
    //             $image = explode(',' , $products->image_products[0]->image_path)[0];
    //         }
    //         else
    //         {
    //             $image = "";
    //         }
    //         $result  = array();
    //         $result['data'] = $products;
    //         $result['image'] = $image;
    //         return json_encode($result); 
    //     }
    // }
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
