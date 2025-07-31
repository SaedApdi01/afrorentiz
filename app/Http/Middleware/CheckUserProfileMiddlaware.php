<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserProfileMiddlaware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->phone && Auth::user()->document && Auth::user()->name) {
            return $next($request);
        } {
            flash()->error('Please verify your profile');
            return redirect()->route('edit-profile');
        }

        flash()->error('Please verify your profile');
        return redirect()->route('edit-profile');
    }
}
