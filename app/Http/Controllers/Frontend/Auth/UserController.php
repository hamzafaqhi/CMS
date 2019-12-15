<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Cart;
use App\Order;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Session;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout','userAccount','resetPassword','updateUserDetails');
    }

    public function index()
    {
        return view('Frontend.pages.myaccount');
    }

    public function login(Request $request)
    {
        $remember = "";
        if($request->isMethod('post'))
        {
            if($request->has('rememberme'))
            {
                $credentials = $request->only('email', 'password');
                if (Auth::attempt($credentials)) {
                    Session::put('LoggedIn',$request->email);
                    $user = auth()->user();
                    Auth::login($user,true);
                    return redirect('/user-account');
                }
                else{
                    return Redirect::back()->with('failure','Invalid credentials');
                }
            }
            else
            {
                $credentials = $request->only('email', 'password');
                if (Auth::attempt($credentials)) {
                    Session::put('LoggedIn',$request->email);
                    return redirect('/my-account');
                }
                else{
                    return Redirect::back()->with('failure','Invalid credentials');
                }
            }
        }
    }

    public function register(Request $request)
    {
        if($request->isMethod('post'))
        {
            $user = new User();
            $validator = Validator::make($request->all(),[          
                'name' => 'required| string |max:255',
                'address' => 'required| string |max:255',
                'city' => 'required| string |max:255',
                'country' => 'required| string |max:255',
                'phone' => 'required|string|max:11|regex:/^[0-9]+$/',
                'province' => 'required| string |max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);
            if ($validator->passes())
            {
                $user->name = $request->name;
                $user->address = $request->address;
                $user->city = $request->city;
                $user->country = $request->country;
                $user->province = $request->province;
                $user->phone = $request->phone;
                $user->email = $request->email;
                $user->role_id = 2;
                $user->password = Hash::make($request->password);
                $user->save();
                $credentials = $request->only('email', 'password');
                if (Auth::attempt($credentials)) {
                    Session::put('LoggedIn',$request->email);
                    return redirect('/user-account');
                }
            }
            return Redirect::back()->withErrors($validator);
        }
       
    }
    public function userAccount(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::where('id',$user_id)->first();
        $order = Order::where('user_id',$user_id)->get();
        if(!$order->isEmpty())
        {
            $order_session = Order::where('user_id',$user_id)->pluck('cart_id');
            if(count($order_session) == 1)
            {
                $cart = Cart::where('session_id',$order_session)->get();
            }
            else
            {
                $cart = Cart::whereIn(['session_id',$order_session])->get();
            }
            return view('Frontend.pages.account',compact('user','order','cart'));
        }
        else
        {
            return view('Frontend.pages.account',compact('user'));
        }
    }

    public function resetPassword(Request $request)
    {
        if($request->isMethod('post'))
        {           
            $user_id = Auth::user()->id;
            $old_pass = $request->old_password;
            $user = User::find($user_id);
            $pass = $user->password;

            if(Hash::check($old_pass,$user->password))
            {
                $validator = Validator::make($request->all(),[
                    'password' => 'required|string|min:8',
                    'confirm_password' => 'required|string|min:8|same:new_password'
                ]);
                if($validator->passes()){
                   $update = User::where('id',$user_id)->update(['password' => $request->password]);
                   return Redirect::back()->with('success','Password changed successfully');
                }
                return Redirect::back()->withErrors($validator);
            }
            else{
                return Redirect::back()->with('failure','Invalid Old Password');
            }
        }
    }

    public function updateUserDetails(Request $request)
    {
        if($request->isMethod('post'))
        {
            $user_id = $request->user_id;
            $validator = Validator::make($request->all(),[
                'first_name' => 'required| string |max:255',
                'last_name' => 'required| string |max:255',
                'address' => 'required| string |max:255',
                'city' => 'required| string |max:255',
                'country' => 'required| string |max:255',
                'phone' => 'required|string|max:11|regex:/^[0-9]+$/',
                'province' => 'required| string |max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);
            if ($validator->passes())
            {
                $user = User::where('id',$user_id)->update(['first_name'=>$request->first_name,'last_name'=>$request->last_name,'address'=>$request->address,
                'city'=>$request->city,'country'=>$request->country,'province'=>$request->province,'phone'=>$request->phone]);
                return Redirect::back()->with('success','User Details Updated Successfully');
            }
            return Redirect::back()->withErrors($validator);
        }
    }
    
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/shop');
    }
}
