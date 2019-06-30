<?php

namespace App\Http\Controllers;
use App\Product;
use Validator;
use Redirect;
use Datatables;
use Illuminate\Http\Request;

class ProductController extends Controller
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
            return datatables()->of(Product::latest()->get())
            ->addColumn('action',function($data){
                $button = '<button type="button" name="edit" id="'.$data->id.'" data-token="{{ csrf_token() }}" class="edit btn btn-primary btn-sm">Edit</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->id.'" data-token="{{ csrf_token() }}" class="delete btn btn-danger btn-sm">Delete</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);            
        }
        return view('pages.product');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $validator = Validator::make($request->all(),[
            'product_name' => 'required',
            'price' => 'required|regex:/^[0-9]+$/',
            'quantity' => 'required|regex:/^[0-9]+$/',
            'stock_status' => 'required',
            'length' => 'regex:/^[0-9]+$/',
            'width' => 'regex:/^[0-9]+$/',
            'height' => 'regex:/^[0-9]+$/',
            'weight' => 'regex:/^[0-9]+$/',

        ]);
        if ($validator->passes())
        {
            $product->name= $request->product_name;
            $product->description= $request->description;
            $product->price=$request->price;
            $product->quantity=$request->quantity;
            $product->stock_status=$request->stock_status;
            $product->length=$request->length;
            $product->width=$request->width;
            $product->height=$request->height;
            $product->weight=$request->weight;
            $product->sortorder=$request->sort_order;
            $product->meta_title=$request->meta_title;
            $product->manufacture_id=$request->manufacture_id;
            $product->save();
            return back()->with('success','Product created successfully');
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
            $data = Product::findOrFail($id);
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
        $Category = Product::find($id);
        $Category->delete();
    }
}
