<?php

namespace App\Http\Controllers;
use App\Product;
use Validator;
use Redirect;
use Datatables;
use App\Manufacture;
use App\Tag;

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
                $button = '<a href="'. route('products.edit', $data->id) .'" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Edit">Edit</a>';
                // '<button type="submit" name="edit" id="'.$data->id.'" data-token="{{ csrf_token() }}" class="edit btn btn-primary btn-sm">Edit</button>';
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
        $man = Manufacture::all();
        $tag = Tag::all();
        return view('pages.create_product')->with(compact('man','tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
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
            $product->tag_id=$request->tag_id;
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

    public function saveProductImage()
    {
        $imgName = time() . request()->file->getClientOriginalName();

        request()->file->move(public_path('upload/products'), $imgName);

        return response()->json($imgName);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $data = Product::findOrFail($id);
            return view('pages.edit')->with(compact('data'));
        
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
        $record = Product::whereId($request->id)->update(['name'=>$request->product_name, 'description' =>$request->description , 'price' =>$request->price ,'quantity' =>$request->quantity,
        'stock_status' =>$request->stock_status,'length' =>$request->length,'width' =>$request->width,'height' =>$request->height,'weight' =>$request->weight,
        'sortorder' =>$request->sortorder,'meta_title' =>$request->meta_title]);        
        return back()->with('success','Product edited successfully');
        }
        return Redirect::back()->withErrors($validator);
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
