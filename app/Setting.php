<?php

namespace App;
use Image;
use File;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public static function updateSetting($request)
    {
        file_put_contents($path, str_replace(
            // 'APP_KEY='.$this->laravel['config']['app.key'], 'APP_KEY='.$key, file_get_contents($path)
            'FRONT_MAIL_DRIVER=', 'FRONT_MAIL_DRIVER=',file_get_contents($path)
        ));
        file_put_contents($path, str_replace(
            'FRONT_MAIL_HOST=', 'FRONT_MAIL_HOST=',file_get_contents($path)
        ));
        file_put_contents($path, str_replace(
            'FRONT_MAIL_PORT=', 'FRONT_MAIL_PORT=',file_get_contents($path)
        ));
        file_put_contents($path, str_replace(
            'FRONT_MAIL_USERNAME=', 'FRONT_MAIL_USERNAME=',file_get_contents($path)
        ));
        file_put_contents($path, str_replace(
            'FRONT_MAIL_PASSWORD=', 'FRONT_MAIL_PASSWORD=',file_get_contents($path)
        ));

        $setting = Setting::where('id',$request->id)->first();
        $setting->store_name= $request->store_name;
        $setting->store_owner= $request->store_owner;
        $setting->address=$request->address;
        $setting->email=$request->email;
        $setting->phone=$request->phone;
        $setting->opening_time = $request->opening_time;
        $setting->closing_time = $request->closing_time;
        $setting->country=$request->country;
        $setting->province=$request->province;
        $setting->city=$request->city;
        $setting->currency=$request->currency;
        if(!empty($request->logo) )
        {
            $image = $request->logo;
            $image_name = $request->logo->getClientOriginalName();  
            $file_name = pathinfo($image_name, PATHINFO_FILENAME);
            $extension = $request->logo->getClientOriginalExtension();
            $imageNameToStore = $file_name.'_'.time().'.'.$extension;
            // $request->file('image')->storeAs('public/images', $imageNameToStore);
            $image_path =  storage_path('app/public/logo/'.$imageNameToStore);
            $img = Image::make($image)
            ->resize(304,384)
            ->save($image_path);
            $setting->logo=$imageNameToStore;
        }
        if(!empty($request->icon) )
        {
            $image = $request->icon;
            $image_name = $request->icon->getClientOriginalName();  
            $file_name = pathinfo($image_name, PATHINFO_FILENAME);
            $extension = $request->icon->getClientOriginalExtension();
            $imageNameToStore = $file_name.'_'.time().'.'.$extension;
            // $request->file('image')->storeAs('public/images', $imageNameToStore);
            $image_path =  storage_path('app/public/icon/'.$imageNameToStore);
            $img = Image::make($image)
            ->resize(304,384)
            ->save($image_path);
            $setting->icon=$imageNameToStore;
        }
        if($request->has('cod'))
        {
            $setting->cod = '1';   
            $setting->deliveryfee=$request->deliveryfee;
        }
        if($request->has('online'))
        {
            $path = base_path('.env');
            $setting->online_payment = '1';
            file_put_contents($path, str_replace(
                // 'APP_KEY='.$this->laravel['config']['app.key'], 'APP_KEY='.$key, file_get_contents($path)
                'STRIPE_KEY=', 'STRIPE_KEY=',file_get_contents($path)
            ));
            file_put_contents($path, str_replace(
                'STRIPE_SECRET=', 'STRIPE_SECRET=',file_get_contents($path)
            ));


            if($request->has('stripe'))
            {
                file_put_contents($path, str_replace(
                    // 'APP_KEY='.$this->laravel['config']['app.key'], 'APP_KEY='.$key, file_get_contents($path)
                    'STRIPE_KEY=', 'STRIPE_KEY='.$request->stripe.'',file_get_contents($path)
                ));

                file_put_contents($path, str_replace(
                    'STRIPE_SECRET=', 'STRIPE_SECRET='.$request->stripe_secret.'',file_get_contents($path)
                ));
            }

            if($request->has('mailengine'))
            {
                file_put_contents($path, str_replace(
                    // 'APP_KEY='.$this->laravel['config']['app.key'], 'APP_KEY='.$key, file_get_contents($path)
                    'FRONT_MAIL_DRIVER=', 'FRONT_MAIL_DRIVER='.$request->mailengine.'',file_get_contents($path)
                ));
                file_put_contents($path, str_replace(
                    'FRONT_MAIL_HOST=', 'FRONT_MAIL_HOST='.$request->mailhost.'',file_get_contents($path)
                ));
                file_put_contents($path, str_replace(
                    'FRONT_MAIL_PORT=', 'FRONT_MAIL_PORT='.$request->mailport.'',file_get_contents($path)
                ));
                file_put_contents($path, str_replace(
                    'FRONT_MAIL_USERNAME=', 'FRONT_MAIL_USERNAME='.$request->username.'',file_get_contents($path)
                ));
                file_put_contents($path, str_replace(
                    'FRONT_MAIL_PASSWORD=', 'FRONT_MAIL_PASSWORD='.$request->password.'',file_get_contents($path)
                ));
    
            }
           
        }
        $setting->save();
   
        return $setting;
        
        
       
    }
}
