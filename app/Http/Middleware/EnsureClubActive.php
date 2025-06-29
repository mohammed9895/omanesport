<?php

namespace App\Http\Middleware;

use App\Enums\ClubStatus;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureClubActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // check if the user club is active or no
        if (auth()->check() && auth()->user()->club && auth()->user()->club->status != ClubStatus::Approved && !$request->routeIs('filament.club.pages.dashboard')) {
            // If the club is not active, redirect to the club onboarding page
            return redirect()->route('filament.club.pages.dashboard');
        }
        return $next($request);
    }
}
