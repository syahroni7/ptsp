<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Auth;
use Illuminate\Support\Facades\Hash;

class same_password_with_username
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
            // return Hash::check($user->username, $user->password);
            if(! Hash::check($user->username, $user->password)){
                return $next($request);
            } else{
                return redirect('/change-password');
            }
        }
        else{
            return redirect('/change-password');
        }

        return $next($request);
    }
}