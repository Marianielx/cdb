<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Administrator
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->level != 'Administrator'){
            return redirect()->route('admin.home')->with('NoAuth', '1');
        }
        return $next($request);
    }
}
