<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->trustProxies(at: '*');
        $middleware->append(\App\Http\Middleware\ForceHttpsRailway::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

// ✅ FORCE HTTPS DI LEVEL TERTINGGI
\Illuminate\Support\Facades\URL::forceScheme('https');

return $app;