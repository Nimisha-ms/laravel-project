<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission)
    {
         //echo $permission;exit;

        //return $next($request);
        $permission = explode('|', $permission);        

        if(checkPermission($permission)){

            return $next($request);
        }

        return response()->view('errors.check-permission');
    }
}
