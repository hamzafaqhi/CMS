<?php

namespace App\Http\Controllers;
use Validator;
use Redirect;
use Illuminate\Http\Request;
use App\Manufacture;
use Illuminate\Support\Facades\Storage;
use Image;
use File;


class ManufactureController extends Controller
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
            return datatables()->of(Manufacture::latest()->get())
            ->addColumn('action',function($data){
                $button = '<button type="submit" name="edit" id="'.$data->id.'" data-token="{{ csrf_token() }}" class="edit btn btn-primary btn-sm">Edit</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->id.'" data-token="{{ csrf_token() }}" class="delete btn btn-danger btn-sm">Delete</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);            
        }
        return view('pages.man');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.manu_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $manu = new Manufacture();
        //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
          if ($validator->passes())
          {
            //save the data to the database    
            if($request->hasFile('image')){
                $image = $request->image;
                $image_name = $request->image->getClientOriginalName();  
                $file_name = pathinfo($image_name, PATHINFO_FILENAME);
                $extension = $request->image->getClientOriginalExtension();
                $imageNameToStore = $file_name.'_'.time().'.'.$extension;
                // $request->file('image')->storeAs('public/images', $imageNameToStore);
                $image_path =  storage_path('app/public/manufacturers/'.$imageNameToStore);
                $img = Image::make($image)
                ->resize(304,384)
                ->save($image_path);
                $manu->image = $imageNameToStore;
    
            };
            $manu->name = $request->name;
            $manu->save();
            return back()->with('success','Manufacturer created successfully');
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
            $data = Manufacture::findOrFail($id);
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
        $validation_rules = [
           'name' => 'required',
        ];
        if(!$request->hidden_image){
            $validation_rules['image'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }
       $validator = Validator::make($request->all(), $validation_rules)->validate(); 
            
        $man = Manufacture::find($request->id);
        $man->name = $request->name;
        if($request->hasFile('image'))
        {
                $image = $request->image;
                $image_name = $request->image->getClientOriginalName();  
                $file_name = pathinfo($image_name, PATHINFO_FILENAME);
                $extension = $request->image->getClientOriginalExtension();
                $imageNameToStore = $file_name.'_'.time().'.'.$extension;
                // $request->file('image')->storeAs('public/images', $imageNameToStore);
                $image_path =  storage_path('app/public/manufacturers/'.$imageNameToStore);
                $img = Image::make($image)
                ->resize(304,384)
                ->save($image_path);
                $man->image = $imageNameToStore;
        }
        $man->save();
        return back()->with('success','Manufacturer updated successfully');
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
        $Man = Manufacture::find($id);
        $image_path = storage_path('app/public/manufacturers/'.$Man->image);  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            File::delete($image_path);

        }
        $Man->delete();
    }
}
