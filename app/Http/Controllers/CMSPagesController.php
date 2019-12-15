<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use Validator;
use Redirect;

class CMSPagesController extends Controller
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
            return datatables()->of(Page::latest()->get())
            ->addColumn('action',function($data){
                $button = '<button type="submit" name="edit" id="'.$data->id.'" data-token="{{ csrf_token() }}" class="edit btn btn-primary btn-sm">Edit</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->id.'" data-token="{{ csrf_token() }}" class="delete btn btn-danger btn-sm">Delete</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);            
        }
        return view('pages.cms_pages.all_pages');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.cms_pages.create_page');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = new Page();
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required',
            'url' => 'required'
        ]);
        
        if ($validator->passes())
        {
            $page->title= $request->title;
            $page->url= $request->url;
            $page->description= $request->description;
            $page->meta_title = $request->meta_title;
            $page->meta_description = $request->meta_description;
            $page->meta_keywords = $request->meta_keywords;

            if($request->has('status'))
            {
                $page->status= $request->status;
          
            }
            else
            {
                $page->status= 0;
            }
           
            $page->save();
            return back()->with('success','Page created successfully');
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
            $data = Page::findOrFail($id);
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
        $record = Page::whereId($request->id)->update(['title'=>$request->title, 'description' =>$request->description, 'url' =>$request->url, 'meta_title' =>$request->meta_title, 'meta_description' =>$request->meta_description, 'meta_keywords' =>$request->meta_keywords, 'status' =>$request->status]);
        
        return back()->with('success','Page edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ban = Page::find($id);
        $ban->delete();
    }

    public function cmsPage($url)
    {
        $details = Page::where('url',$url)->where('status',1)->first();
        if(!empty($details))
        {
            return view('Frontend.pages.cms_page',compact('details'));
        }
        else
        {
            return view('Frontend.pages.404');
        }
    }
}
