<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard === 'admin') {
            if (Auth::guard($guard)->check()) {
                return redirect()->route('dashboardAdmin.index');
            } else {
                return redirect()->route('loginAdmin.index');
            }
        } elseif ($guard === 'web') {
            if (Auth::guard($guard)->check()) {
                return redirect()->route('dashboard.index');
            } else {
                return redirect()->route('loginPegawai.index');
            }
        }

        return $next($request);
    }

}
