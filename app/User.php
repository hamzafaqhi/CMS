<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','city',
        'country','address','province','phone','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name. ' '. $this->last_name;
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
    
    public function role()
    {
        return $this->hasOne('App\Role', 'id', 'role_id');
    }
    public function hasRole($roles)
    {
        $this->have_role = $this->getUserRole();

        // Check if the user is a root account
        if($this->have_role->name == $roles) 
        {
            return true;
        }
        if(is_array($roles))
        {
            foreach($roles as $need_role){
                if($this->checkIfUserHasRole($need_role)) {
                    return true;
                }
            }
        } else
        {
            return $this->checkIfUserHasRole($roles);
        }
        return false;
    }

    private function getUserRole()
    {
        return $this->role()->getResults();
    }

    private function checkIfUserHasRole($need_role)
    {
        return (strtolower($need_role)==strtolower($this->have_role->name)) ? true : false;
    }

}
