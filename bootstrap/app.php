<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\EnsureTokenIsValid;
 




return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Register your middleware here
        //$middleware->append(EnsureTokenIsValid::class);
        // You can also prepend more middleware if needed
        // $middleware->prepend(AnotherMiddleware::class);
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

    

    