<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Artisan;
use App\User;

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
