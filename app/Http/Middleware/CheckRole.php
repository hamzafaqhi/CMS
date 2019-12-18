<?php

namespace App\Http\Middleware;
use App\Role;
use Closure;
use Illuminate\Support\Facades\Auth;

use Redirect;
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $role = Role::where('id',auth::user()->role_id)->first();
        if ($role->name == 'admin')
        {
            return $next($request);
        }
        else
        {
            return Redirect::back();
        }
    }
}
