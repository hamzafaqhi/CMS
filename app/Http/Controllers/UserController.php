<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
            return datatables()->of(User::where('role_id',2)->get())
            ->addColumn('action',function($data){
                $button = '<button type="submit" name="edit" id="'.$data->id.'" data-token="{{ csrf_token() }}" class="edit btn btn-primary btn-sm">Make Admin</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->id.'" data-token="{{ csrf_token() }}" class="deactivate btn btn-danger btn-sm">Deactivate</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->id.'" data-token="{{ csrf_token() }}" class="activate btn btn-success btn-sm">Enable</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);            
        }
        return view('pages.user.users');
    }

    public function getAdmin()
    {
        if (request()->ajax())
        {
            return datatables()->of(User::where('role_id',1)->get())
            ->addColumn('action',function($data){
                $button = '<button type="submit" name="edit" id="'.$data->id.'" data-token="{{ csrf_token() }}" class="edit btn btn-primary btn-sm">Make Admin</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->id.'" data-token="{{ csrf_token() }}" class="deactivate btn btn-danger btn-sm">Deactivate</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->id.'" data-token="{{ csrf_token() }}" class="activate btn btn-success btn-sm">Enable</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);            
        }
        return view('pages.user.adminusers');
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
    public function show($id)
    {
        $user = User::where('id',$id)->first();
        return view('pages.user.profile',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
            $user_id = Auth::user()->id;
            $user = User::find($user_id);
            $validation_rules = [
                'first_name' => 'required| string |max:255',
                'last_name' => 'required| string |max:255',
                'address' => 'required| string |max:255',
                'city' => 'required| string |max:255',
                'country' => 'required| string |max:255',
                'phone' => 'required|string|max:11|regex:/^[0-9]+$/',
                'province' => 'required| string |max:255',
                'email' => 'required|string|max:255|unique:users,email,'.$user_id,              
                // 'old_password' => 'required',
                // 'password' => 'required|string|min:8',
                // 'confirm_password' => 'required|string|min:8|same:new_password'
            ];
            if($request->has('passsword'))
            {
                $validation_rules['old_password'] = 'required|string|min:8';
                $validation_rules['password'] = 'required|string|min:8';
                $validation_rule['confirm_password'] ='required|string|min:8|same:password';
            }
            $validator= Validator::make($request->all(), $validation_rules);
            $validator->validate();
            $user->name = $request->name;
            $user->address = $request->address;
            $user->city = $request->city;
            $user->country = $request->country;
            $user->province = $request->province;
            $user->phone = $request->phone;
            $user->email = $request->email;
               
            if($request->has('old_password'))
            {
                $old_pass = $request->old_password;
                $user = User::find($user_id);
                $pass = $user->password;
                if(Hash::check($old_pass,$pass))
                {
                    $user->password = Hash::make($request->password);
                }
                else
                {
                    return Redirect::back()->with('failure','Incorrect Old Password');
                }
            }
            else
            {
                return Redirect::back()->withErrors($validator);
            }
           
            
          
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRole(Request $request)
    {
        $user = User::where('id',$request->user_id)->update(['role_id' => 1]);
        return $user;
    }

    public function deactivateUser(Request $request)
    {
        $user = User::where('id',$request->user_id)->update(['disable' => 1]);
        return $user;
    }

    public function activateUser(Request $request)
    {
        $user = User::where('id',$request->user_id)->update(['disable' => 0]);
        return $user;
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
