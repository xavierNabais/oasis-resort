<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateEmployee
{
    //Login de funcionário
    public function handle($request, Closure $next, $guard = 'employee')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
