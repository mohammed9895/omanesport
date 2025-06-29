<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->appendToGroup('web', \App\Http\Middleware\LocalChange::class);
        $middleware->append([
            \App\Http\Middleware\EnsureUserHasClub::class,
        ]);
        $middleware->redirectGuestsTo(fn (Request $request) =>
        str($request->path())->startsWith('club/onboarding')
            ? route('filament.club.auth.login')
            : route('filament.gamer.auth.login') // or fallback login route
        );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
