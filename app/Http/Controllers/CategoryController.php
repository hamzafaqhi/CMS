<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Validator;
use Redirect;
use Datatables;

class CategoryController extends Controller
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
            return datatables()->of(Category::latest()->get())
            ->addColumn('action',function($data){
                $button = '<button type="button" name="edit" id="'.$data->id.'" data-token="{{ csrf_token() }}" class="edit btn btn-primary btn-sm">Edit</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->id.'" data-token="{{ csrf_token() }}" class="delete btn btn-danger btn-sm">Delete</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);            
        }
        //$category = Category::orderBy('created_at','desc')->get()->->with('category',$category);
        return view('pages.category');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('parent_id',null)->get();
       
        return view('pages.createcategory',compact('category'));
    }

    public function store(Request $request)
    {  
        $category = new Category();
        $validator = Validator::make($request->all(),[
            'category_name' => 'required',
            'description' => 'required'
        ]);
        
        if ($validator->passes())
        {
            $category->name= $request->category_name;
            $category->description= $request->description;
            if($request->has('sort_order'))
            {
                $category->sortorder= $request->sort_order;
            }
            else
            {
                $category->sortorder= 0;
            }
            if($request->has('parent_id'))
            {
                $category->parent_id = $request->parent_id;
            }
            
            $category->save();
            return back()->with('success','Category created successfully');
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
            $data = Category::findOrFail($id);
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
        $record = Category::whereId($request->id)->update(['name'=>$request->name, 'description' =>$request->description]);
        
        return back()->with('success','Category edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category = Category::find($id);
        $Category->delete();
    }
}
