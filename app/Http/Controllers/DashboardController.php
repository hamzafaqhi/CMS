<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Artisan;
use App\User;
use DB;
use File;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    private $maintenance;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = User::where('role_id',2)->count();
        $order = Order::where('status','processing')->count();
        $returns = Order::where('status','returned')->count();
        $products = Product::count();
        return view('pages.dashboard',compact('user','order','returns','products'));
    }


  public function invoice()
    {
        return view('pages.invoice');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.category');
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
        //
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

    public function maintenance()
    {
        $main = env("Maintenance");
        return view('pages.maintenance.index',compact('main'));
    }

    public function maintenanceOn()
    {
        Artisan::call('down');
        $path = base_path('.env');
        if (file_exists($path)) {
          file_put_contents($path, str_replace(
            // 'APP_KEY='.$this->laravel['config']['app.key'], 'APP_KEY='.$key, file_get_contents($path)
            'Maintenance=false', 'Maintenance=true',file_get_contents($path)
          ));
        }
        return 'true';
    }
    
    public function themeChange($id)
    {
        if($id=='1')
        {        
            Storage::disk('local')->put('file.txt', '1');
            return back()->with('success', ' YOU HAVE SELECTED THEME  '.$id.'". PLEASE REFRESH YOUR WEBSITE TO SEE THE CHANGES!!"');
        
        }
        elseif($id=='2') 
        {        
            Storage::disk('local')->put('file.txt', '2');
          return back()->with('success', ' YOU HAVE SELECTED THEME  '.$id.'". PLEASE REFRESH YOUR WEBSITE TO SEE THE CHANGES!!"');
        
        }
        
        elseif($id=='3') 
        {        Storage::disk('local')->put('file.txt', '3');
            return back()->with('success', ' YOU HAVE SELECTED THEME  '.$id.'. PLEASE REFRESH YOUR WEBSITE TO SEE THE CHANGES!!"');}
        elseif($id=='4') {        Storage::disk('local')->put('file.txt', '4');
            return back()->with('success', ' YOU HAVE SELECTED THEME  '.$id.'. PLEASE REFRESH YOUR WEBSITE TO SEE THE CHANGES!!"');}
        elseif($id=='5') {        Storage::disk('local')->put('file.txt', '5');
            return back()->with('success', ' YOU HAVE SELECTED THEME  '.$id.'. PLEASE REFRESH YOUR WEBSITE TO SEE THE CHANGES!!"');}
        elseif($id=='6') {        Storage::disk('local')->put('file.txt', '6');
            return back()->with('success', ' YOU HAVE SELECTED THEME  '.$id.'. PLEASE REFRESH YOUR WEBSITE TO SEE THE CHANGES!!"');}
        elseif($id=='7') {        Storage::disk('local')->put('file.txt', '7');
            return back()->with('success', ' YOU HAVE SELECTED THEME  '.$id.'. PLEASE REFRESH YOUR WEBSITE TO SEE THE CHANGES!!"');}
        
    }
    public function maintenanceOff()
    {
        Artisan::call('up');
        $path = base_path('.env');

        if (file_exists($path)) {
          file_put_contents($path, str_replace(
            // 'APP_KEY='.$this->laravel['config']['app.key'], 'APP_KEY='.$key, file_get_contents($path)
            'Maintenance=true', 'Maintenance=false',file_get_contents($path)
          ));
        }
        return 'true';
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
