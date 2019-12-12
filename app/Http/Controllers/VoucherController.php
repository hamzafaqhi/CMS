<?php

namespace App\Http\Controllers;

use App\Voucher;
use Validator;
use Redirect;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VoucherController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax())
        {
            return datatables()->of(Voucher::latest()->get())
            ->addColumn('action',function($data){
                $button ='<button type="submit" name="edit" id="'.$data->id.'" data-token="{{ csrf_token() }}" class="edit btn btn-primary btn-sm">Edit</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->id.'" data-token="{{ csrf_token() }}" class="delete btn btn-danger btn-sm">Delete</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);            
        }
        return view('pages.vouchers.voucher');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.vouchers.create_vouchers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(),[
            'name' => 'required|unique:vouchers,name',
            'amount' => 'required|regex:/^[0-9]+$/',
            'amount_type' => 'required',
            // 'expiry_date' => 'required|after:today',
        ]);
        if($validator->passes())
        {
           $date = Carbon::createFromFormat('d-m-Y', $request->expiry_date)->format('Y-m-d');
           $voucher = new Voucher();
           $voucher->name = $request->name;
           $voucher->amount = $request->amount;
           $voucher->amount_type = $request->amount_type;
           $voucher->expiry_date = $date;
           if($request->has('status'))
           {
               $voucher->status = '1';
           }
           else
           {
            $voucher->status = '0';
           }
           $voucher->save();
           return Redirect::back()->with('success','Voucher created successfully');
        }
        return Redirect::back()->withErrors($validator);
       
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
        if (request()->ajax())
        {
            $data = Voucher::findOrFail($id);
            return response()->json(['data'=>$data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $record = Voucher::whereId($request->id)->update(['name'=>$request->name, 'amount' =>$request->amount, 'amount_type' =>$request->amount_type, 'expiry_date' =>$request->expiry_date , 'status' =>$request->status]);
        
        return back()->with('success','Voucher edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category = Voucher::find($id);
        $Category->delete();
    }
}
