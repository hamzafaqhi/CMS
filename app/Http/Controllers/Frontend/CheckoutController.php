<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use Response;
use App\User;
use App\Order;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {   
        $user_id = Auth::user()->id;
        $user = User::where('id',$user_id)->first();
        $session_id = Session::get('session_id');
        $cart_items = Cart::getCart($session_id);
        return view('Frontend.pages.checkout',compact('cart_items','user'));
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
        $user_id = Auth::user()->id;
        $orderno = 1;
        $latestOrder = Order::orderBy('created_at','DESC')->first();
        if($latestOrder)
        {
            $orderno = $latestOrder->id;
        }
        $validator = Validator::make($request->all(),[
            'first_name' => 'required| string |max:25',
            'last_name' => 'required| string |max:25',
            'address' => 'required| string |max:255',
            'city' => 'required| string |max:25',
            'country' => 'required| string |max:25',
            'phone' => 'required|string|max:11|regex:/^[0-9]+$/',
            'province' => 'required| string |max:25',
            'email' => 'required|string|email|max:25',
            'postcode' => 'required| string |max:25',
            'payment_type' => 'required'
        ]);
        if($validator->passes())
        {
            $cart = Cart::where('session_id',$request->cart_id)->get();
            if(Session::has('total_amount'))
            {
                $total_price = Session::get('total_amount');
            }
            else
            {
                $total_price = $cart->sum->total_price;
            }
            $order = new Order;
            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->address = $request->address;
            $order->city = $request->city;
            $order->country = $request->country;
            $order->province = $request->province;
            $order->phone = $request->phone;
            $order->user_id = $user_id;
            $order->email = $request->email;
            $order->post_code = $request->postcode;
            $order->order_code = '#'.str_pad($orderno + 1, 8, "0", STR_PAD_LEFT);
            $order->payment_type = $request->payment_type;
            $order->cart_id = $request->cart_id;
            $order->status = "processing";
            $order->total_price = $total_price; 
            if($order->save())
            {
                $cart_status = Cart::where('session_id',$request->cart_id)->update(['status' => 0]);

            }
            Session::forget('cart_items');
            Session::forget('total_price');
            Session::forget('total_amount');
            Session::forget('voucher_amount');   
            return redirect('myaccountpage');
        }
        else
        {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    }

    public function cancelOrder($id)
    {
        $order =  Order::where('id',$id)->first();
        $current_date = Carbon::now();
        $order_date = new Carbon($order->created_at);
        $days = $order_date->diffInDays($current_date);
        if($days > 15){
            return "false";
        }
        else
        {
            $order = Order::where('id',$id)->update(['status'=>'cancelled']);
            return 'true';
        }
    }

    public function returnOrder($id)
    {
        
        $order =  Order::where('id',$id)->first();
        $current_date = Carbon::now();
        $order_date = new Carbon($order->created_at);
        $days = $order_date->diffInDays($current_date);
        if($days > 15){
            return "false";
        }
        else
        {
            $order = Order::where('id',$id)->update(['status'=>'returning']);
            return 'true';
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
    public function destroy($id)
    {
        //
    }
}
