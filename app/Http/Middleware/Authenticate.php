<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    //Login de cliente
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('client.login');
        }
    }
}
