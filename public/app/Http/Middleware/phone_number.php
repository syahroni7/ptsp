<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Auth;
use Illuminate\Support\Facades\Hash;

class phone_number
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

        if(Auth::check()){
            $user = Auth::user();
            if($user->no_hp){
                return $next($request);
            } else{
                return redirect('/phone_number/set');
            }
        }
        else{
            return redirect('/phone_number/set');
        }

        return $next($request);
    }
}