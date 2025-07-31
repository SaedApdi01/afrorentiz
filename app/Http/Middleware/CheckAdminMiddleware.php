<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->web_role == 5) {
            return $next($request);
        } else {
            flash()->error('You are do not have access⛔');
            return redirect()->route('dashboard');
        }
        flash()->error('You are do not have access⛔');
        return redirect()->route('dashboard');
    }
}
