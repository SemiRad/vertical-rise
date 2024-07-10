<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class loginFirst
{
      public function handle(Request $request, Closure $next): Response
    {
        if(!Session()->has('loginID')){
            return redirect('/')->with('fail', 'You must log in first.');
        }
        return $next($request);
    }
}
