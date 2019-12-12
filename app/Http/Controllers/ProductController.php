<?php

namespace App\Http\Controllers;

use App\Image_Product;
use App\Product;
use Validator;
use Redirect;
use Datatables;
use App\Manufacture;
use App\Tag;
use App\Category;
use App\Product_Related;
use Image;

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
        $cat = Category::where(['parent_id'=> 0])->get();
        $products = Product::get();
        $categories_d = "<option value=''></option>";
            foreach($cat as $c)
            {
                $categories_d .= "<option  value='".$c->id."'>".$c->name."</option>";
                // $cats = Category::where('parent_id', 0)->pluck('id');
                $category = Category::where(['parent_id'=>$c->id])->get();
                foreach($category as $sub_c)
                {
                    $categories_d .= "<option  value='".$sub_c->id."'>&nbsp;--&nbsp;".$sub_c->name."</option>";
                }
            }
        
        return view('pages.create_product')->with(compact('man','tag','cat','category','categories_d','products'));
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
        $product_image = new Image_Product();
        $validator = Validator::make(request()->all(),[
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
            $product->name= request()->product_name;
            $product->description= request()->description;
            $product->price=request()->price;
            $product->quantity=request()->quantity;
            $product->stock_status=request()->stock_status;
            $product->length=request()->length;
            $product->width=request()->width;
            $product->height=request()->height;
            $product->weight=request()->weight;
            $product->sortorder=request()->sort_order;
            $product->meta_title=request()->meta_title;
            $product->manufacture_id=request()->manufacture_id;
            $product->tag_id=request()->tag_id;
            $product->category_id=request()->category_id;
            $product->save();
        }
            if(request()->exists('related_product'))
            {   
                $related_product = new Product_Related();
                $related_product->product_id = $product->id;
                for ($i = 1; $i < count(request()->related_product); $i++) {
                    $answers[] = [
                        'product_id' => $product->id,
                        'related_product_id' => request()->related_product[$i],
                    ];
                }
                $related_product->insert($answers);
            }
            if(request()->exists('image') )
            {
                $messages = [
                    "attachments.max" => "You can't upload more than 3 images."
                 ];
                $validator = Validator::make(request()->all(),[
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'image' => 'max:3',
                    ],$messages);
               
                if($validator->passes())
                {
                    $image =  request()->file('image');
                    foreach ($image as $files) 
                    {
                        
                        $name = $files->getClientOriginalName().'_'.time().'.'.$files->extension();
                        $files->move(storage_path().'/app/public/products/', $name);  
                        $data[] = $name;
                        print_r($data);
                    }
                    $product_image->product_id = $product->id;
                    $product_image->image_path = implode(',',$data);
                    $product_image->save();                    
                }
            }
            return back()->with('success','Product created successfully');
        
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
        dd(request()->all());
        $imgName = time() . request()->file->getClientOriginalName();

        request()->file->move(public_path('upload/products'), $imgName);

        return response()->json($imgName);
    }

    public function deleteProductImage()
    {
        // File::delete(request()->)
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $man = Manufacture::all();
        $tag = Tag::all();
        $products = Product::get();
        $cat = Category::where(['parent_id'=> 0])->get();
        $categories_d = "<option value=''></option>";
            foreach($cat as $c)
            {
                $categories_d .= "<option  value='".$c->id."'>".$c->name."</option>";
                // $cats = Category::where('parent_id', 0)->pluck('id');
                $category = Category::where(['parent_id'=>$c->id])->get();
                foreach($category as $sub_c)
                {
                    $categories_d .= "<option  value='".$sub_c->id."'>&nbsp;--&nbsp;".$sub_c->name."</option>";
                }
            }
            $data = Product::findOrFail($id);
            return view('pages.edit')->with(compact('data','man','tag','cat','category','categories_d','products'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $product = Product::find(request()->id);
        $validator = Validator::make(request()->all(),[
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
            $product->name= request()->product_name;
            $product->description= request()->description;
            $product->price=request()->price;
            $product->quantity=request()->quantity;
            $product->stock_status=request()->stock_status;
            $product->length=request()->length;
            $product->width=request()->width;
            $product->height=request()->height;
            $product->weight=request()->weight;
            $product->sortorder=request()->sort_order;
            $product->meta_title=request()->meta_title;
            $product->manufacture_id=request()->manufacture_id;
            $product->tag_id=request()->tag_id;
            $product->category_id=request()->category_id;
            $product->save();
        }
        if(request()->exists('related_product'))
            {   
                $related_product = Product_Related::where('product_id',request()->id)->first();
                for ($i = 1; $i < count(request()->related_product); $i++) {
                    $answers[] = [
                        'product_id' => $product->id,
                        'related_product_id' => request()->related_product[$i],
                    ];
                }
                $related_product->insert($answers);
            }
            if(request()->exists('image') )
            {
                $messages = [
                    "attachments.max" => "You can't upload more than 3 images."
                 ];
                $validator = Validator::make(request()->all(),[
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'image' => 'max:3',
                    ],$messages);
               
                if($validator->passes())
                {
                    $image =  request()->file('image');
                    foreach ($image as $files) 
                    {
                        
                        $name = $files->getClientOriginalName().'_'.time().'.'.$files->extension();
                        $files->move(storage_path().'/app/public/products/', $name);  
                        $data[] = $name;
                        print_r($data);
                    }
                    $product_image = Image_Product::where('product_id',request()->id)->update(['image_path' => implode(',',$data)]);         
                }
            }
            return back()->with('success','Product updated successfully');
        
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
