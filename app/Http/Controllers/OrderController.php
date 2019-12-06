<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax())
        {
            return datatables()->of(Order::where('status','processing')->get())
            ->addColumn('action',function($data){
                $button = '<a href="'. route('order.invoice', $data->id) .'" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="View">View</a>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);            
        }
        return view('pages.orders.order');
    }

    public function invoice($id)
    {
        
        $data = Order::findOrFail($id);
        $user = User::where('id',$data->user_id)->first();
        $cart = Cart::where('session_id',$data->cart_id)->get();
        $total_price = $cart->sum->total_price;
        return view('pages.orders.invoice',compact('data','cart','user','total_price'));
    }

    public function returns()
    {
        if (request()->ajax())
        {
            return datatables()->of(Order::where('status','return')->get())
            ->addColumn('action',function($data){
                $button = '<a href="'. route('order.invoice', $data->id) .'" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="View">View</a>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);            
        }
        return view('pages.orders.return');
    }

    public function cancel()
    {
        if (request()->ajax())
        {
            return datatables()->of(Order::where('status','cancelled')->get())
            ->addColumn('action',function($data){
                $button = '<a href="'. route('order.invoice', $data->id) .'" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Edit">View</a>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);            
        }
        return view('pages.orders.cancel');
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
    public function redirectView($status)
    {
        if($status == "cancelled")
        {
            return view('pages.orders.cancel');
        }
        if($status == "processing")
        {
            return view('pages.orders.order');
        }
        if($status == "return")
        {
            return view('pages.orders.return');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function cancelInvoice($id)
    // {

    // }

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
