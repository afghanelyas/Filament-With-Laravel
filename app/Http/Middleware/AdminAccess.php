<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    public function handle(Request $request, Closure $next): Response
    {
      // check if the user is logged in and has a admin role
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }
        // if the user is not an admin, redirect them to another page with an error message
        return redirect()->route('home')->with('error', 'You do not have admin access.');
    }
}
