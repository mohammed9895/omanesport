<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasGamer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /// Only run logic if authenticated
        if (Auth::check()) {
            $user = Auth::user();
            // Prevent loop
            if (!$user->gamer()->exists() && !$request->routeIs('gamer.onboarding')) {
                return redirect()->route('gamer.onboarding');
            }
        }

        return $next($request);
    }
}
