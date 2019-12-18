<?php

namespace App\Http\Controllers\Frontend;

use App\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Voucher;
use Carbon\Carbon;
use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $session_id = Session::get('session_id');
        $cart_items = Cart::getCart($session_id);
        return view('Frontend.pages.cart',compact('cart_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProduct($id)
    {
        $product = Product::where('id',$id)->first();
        dd($product);
        return($product); 
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
        $session_id = Session::get('session_id');
        if(empty($session_id))
        {
            $session_id = str_random(10);
            Session::put('session_id',$session_id);
        }
        $cart_items = Cart::where('session_id',$session_id)->where('product_id',$id)->where('status',1)->first();
        if(!empty($cart_items))
        {
           $cart_items->quantity = $cart_items->quantity += 1;
           $total_price = $product->price * $cart_items->quantity;
           $cart_items->total_price =  $total_price;
           if($cart_items->save())
            {
                return response()->json('Product Added to Cart');
            }
            else
            {
                return response()->json(array("error" => "Cannot add product to the cart"));
            }

        }
        else
        {
            $cart = new Cart();
            $cart->product_id = $product->id;
            $cart->product_name = $product->name;
            $cart->price = $product->price;
            $total_price = $product->price;
            $cart->total_price = $total_price;
            $cart->status = 1;
            $cart->quantity = 1;
            $cart->session_id = $session_id;
            if($cart->save())
            {
                return response()->json('Product Added to Cart');
            }
            else
            {
                return response()->json(array("error" => "Cannot add product to the cart"));
            }

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addVoucher(Request $request)
    {
        $cart_items = Cart::where('session_id',$request->session)->where('status',1)->get();
        $total_price = $cart_items->sum->total_price;
        if(empty($cart_items->coupon_code))
        {
        $voucher = Voucher::where('name',$request->name)->count();
        if($voucher == 0)
        {
            return response()->json(array("error" => "Voucher not found"));
        }
        else
        {
            $current_date = Carbon::now();
            $voucher = Voucher::where('name',$request->name)->first();
            if($voucher->status == 0)
            {
                return response()->json(array("info" => "Voucher is not active")); 
            }
            elseif( $voucher->expiry_date < $current_date)
            {
                return response()->json(array("expire" => "Voucher is expired")); 
            }
            else
            {
                $cart = Cart::where('session_id',$request->session)->where('status',1)->update(['coupon_code' => $request->name]);
                if( $voucher->amount_type == 'fixed')
                {
                    $amount = $voucher->amount;
                }
                else
                {
                    $amount = $total_price * $voucher->amount/100;
                }
                
                $total_amount = $total_price - $amount;
                if($total_amount > 200)
                {
                    Session::put('voucher_amount',$amount);
                    Session::put('total_amount',$total_amount);
                    return response()->json(array("success" => "Voucher is applied"));
                }
                {
                    return response()->json(array("need" => "Voucher cannot be applied")); 
                }
                
            }
        }
        }
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
    public function updateCart(Request $request)
    {
        $cart = cart::where('session_id',$request->session)->where('id',$request->id)->first();
        $product_price = $cart->price;
        $cart->quantity = $request->quantity;
        $cart->total_price = $request->quantity * $product_price;
        $cart->save();
        return 'true';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyCart(Request $request)
    {
        $cart = cart::where('session_id',$request->session)->where('product_id',$request->id)->delete();
        return 'true';
    }
}
