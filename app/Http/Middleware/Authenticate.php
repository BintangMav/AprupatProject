<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        if (in_array('admin', $guards)) {
            if (!auth()->guard('admin')->check()) {
                return redirect()->route('loginAdmin.index');
            }
        } else {
            if (!auth()->guard('web')->check()) {
                return redirect()->route('loginPegawai.index');
            }
        }

        return $next($request);
    }
}
