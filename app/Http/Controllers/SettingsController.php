<?php

namespace App\Http\Controllers;

use App\Setting;
use Validator;
use Redirect;
use Illuminate\Http\Request;

class SettingsController extends Controller
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
            return datatables()->of(Setting::latest()->get())
            ->addColumn('action',function($data){
                $button = '<a href="'. route('settings.edit', $data->id) .'" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Edit">Edit</a>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);            
        }
        return view('pages.settings.setting');
       
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
        $setting = Setting::where('id',$id)->first();
        return view ('pages.settings.create-setting',compact('setting'));
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
  
        $validation_rules = [
            'store_name' => 'required',
            'store_owner' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'opening_time' => 'required',
            'closing_time' => 'required',
            'country' => 'required',
            'province' => 'required',
            'city' => 'required',
            'currency' => 'required',
        ];
        if(!request()->has('mailsetting'))
        {
            $validation_rules['mailhost'] = 'required';
            $validation_rules['mailport'] = 'required';
            $validation_rules['username'] = 'required';
            $validation_rules['password'] = 'required';
            $validation_rules['mailengine'] = 'required';
        }
        if(!request()->logo_path){
            $validation_rules['logo'] = 'mimes:jpeg,jpg,png,gif|required|max:10000';
        }
        if(!request()->icon_path){
            $validation_rules['icon'] = 'mimes:jpeg,jpg,png,gif|required|max:10000';
        }
        if(request()->has('cod')){
            $validation_rules['deliveryfee'] = 'required';
        }
        if(request()->has('online')){
            $validation_rules['stripe'] = 'required';
        }
        Validator::make(request()->all(), $validation_rules)->validate();
     
        $settings = Setting::updateSetting(request());
        return back()->with('success','Settings updated successfully');
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
