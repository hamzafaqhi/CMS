<?php

namespace App\Http\Controllers;

use App\Banner;
use Validator;
use Redirect;
use Image;
use File;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    { 
        if (request()->ajax())
        {
            return datatables()->of(Banner::latest()->get())
            ->addColumn('action',function($data){
                $button = '<button type="submit" name="edit" id="'.$data->id.'" data-token="{{ csrf_token() }}" class="edit btn btn-primary btn-sm">Edit</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->id.'" data-token="{{ csrf_token() }}" class="delete btn btn-danger btn-sm">Delete</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);            
        }
        return view('pages.banner.banners');
    }
    public function create()
    {
        return view('pages.banner.create_banner');
    }

    public function store(Request $request)
    {
        $ban = new Banner();        //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        $validator = Validator::make($request->all(),[
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
                $image_path =  storage_path('app/public/banners/'.$imageNameToStore);
                $img = Image::make($image)
                ->resize(1500,600)
                ->save($image_path);
                $ban->image = $imageNameToStore;
    
            };
            if($request->has('title'))
            {
                $ban->title = $request->title;
            }
            
            if($request->has('link'))
            {
                $ban->links = $request->link;
            }

            if($request->has('status'))
            {
                $ban->status = $request->status;
            }
            $ban->save();
            return back()->with('success','Banner created successfully');
        }
        return Redirect::back()->withErrors($validator);
    }

  

    public function update(Request $request)
    {
        
        if(!$request->hidden_image)
        {
            $validation_rules['image'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
            $validator = Validator::make($request->all(), $validation_rules)->validate(); 
        }
      
            
        $ban = Banner::find($request->id);
        $ban->title = $request->title;
        if($request->hasFile('image'))
        {
                $image = $request->image;
                $image_name = $request->image->getClientOriginalName();  
                $file_name = pathinfo($image_name, PATHINFO_FILENAME);
                $extension = $request->image->getClientOriginalExtension();
                $imageNameToStore = $file_name.'_'.time().'.'.$extension;
                // $request->file('image')->storeAs('public/images', $imageNameToStore);
                $image_path =  storage_path('app/public/banners/'.$imageNameToStore);
                $img = Image::make($image)
                ->resize(1920,950)
                ->save($image_path);
                $ban->image = $imageNameToStore;
        }
        if($request->has('links'))
        {
            $ban->links = $request->links;
        }
        if($request->has('status'))
        {
            $ban->status = $request->status;
        }
        
        $ban->save();
        return back()->with('success','Manufacturer updated successfully');
        return Redirect::back()->withErrors($validator);
    }


    public function edit($id)
    {
        if (request()->ajax())
        {
            $data = Banner::findOrFail($id);
            return response()->json(['data'=>$data]);
        }
    }


    public function destroy($id)
    {
        $ban = Banner::find($id);
        $image_path = storage_path('app/public/banners/'.$ban->image);  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $ban->delete();
    }
}
