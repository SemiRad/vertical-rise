<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class isAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
    if (!Session()->has('loginID')) {
        return redirect('/login')->with('fail', 'You must log in first.');
    }
    
    $userId = Session()->get('loginID');
    $user = User::find($userId); // Retrieve the user record from the database
    
    if ($user->is_admin == 0) {
        return redirect('/home')->with('fail', 'You do not have permission to access this page.');
    }
    
    return $next($request);
}

}
