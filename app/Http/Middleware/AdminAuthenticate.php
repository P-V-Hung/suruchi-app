<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AdminAuthenticate 
{

    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard('admin')->check()){
            return $next($request);
        }
        return redirect(route('admin.login'));
    }
}
