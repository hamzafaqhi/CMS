<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\product_related;
use App\Tag;
use App\Voucher;
use Carbon\Carbon;
use App\Banner;
use App\Review;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null, $tag= null,Request $request)
    {
        if($request->isMethod('POST'))
        {
            if ($request->has('search'))
        {
                $products = Product::where('name','LIKE', '%' . $request->search . '%' )->latest()->paginate(10);
            }
            elseif ($request->has('amount'))
            {
                $price = array_map('trim',explode("-",$request->amount));
                $start = $price['0'];
                $end = $price['1'];
                $products = Product::whereBetween('price', [$start, $end])->latest()->paginate(10);
                
            }
        }
        elseif(!empty($tag))
        {
            $products = Product::where('tag_id',$tag)->latest()->paginate(10);
        }
        elseif(!empty($id))
        {
            $products = Product::where('category_id',$id)->latest()->paginate(10);
        }
        else
        {
            $products = Product::latest()->paginate(10);
        }
        $products->currentPage();
        $products->total();
        $products->perPage();
        $category = Category::where(['parent_id'=> 0])->get();    
        $categories = "";
            foreach($category as $c)
            {
                $p = Product::where('category_id',$c->id)->get();
                $p_count = $p->count();
                $categories .="<li><a href=' ". route('search_cat',  ['id' => $c->id, '$tag' => 0 ]) ." '>".$c->name." <span>(".$p_count.")</span></a></li>";
                // $cats = Category::where('parent_id', 0)->pluck('id');
                $cat = Category::where(['parent_id'=>$c->id])->get();
                foreach($cat as $sub_c)
                {
                    $p = Product::where('category_id',$sub_c->id)->get();
                    $p_count = $p->count();
                    $categories .= "<ul><li><a href=' ". route('search_cat', ['id' => $sub_c->id, '$tag' => 0 ]) ." '>&nbsp;&nbsp;&nbsp;".$sub_c->name."<span>(".$p_count.")</span></a></li></ul>";
                }
            }
        $today = Carbon::now();
        $voucher = Voucher::where('status',1)->where('expiry_date','>',$today)->first();
        $tag = Tag::get();
        $banner = Banner::where('status',1)->latest()->get();
        return view('Frontend.pages.shop',compact('products','category','tag','categories','voucher','banner'));
    }

    public function singleProduct($id)
    {
        $review = Review::getRating($id);
        $banner = Banner::where('status',1)->latest()->get();
        $products = Product::with('image_products')->where('id',$id)->first();
        $category = Category::find($products->category_id);
        $today = Carbon::now();
        $voucher = Voucher::where('status',1)->where('expiry_date','>',$today)->first();
        $related_products_id = product_related::where('product_id',$id)->pluck('related_product_id');
        $related_products = Product::whereIn('id',$related_products_id)->get();
        $upsell = Product::getUpsellProducts();
        return view('Frontend.pages.single_product',compact('products','related_products','category','banner','voucher','review'));
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
