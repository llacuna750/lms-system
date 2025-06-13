<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        
        $middleware->alias([                                        // 6th update
            'role' => \App\Http\Middleware\RoleMiddleware::class,   // push in gh repo 6th update 
        ]);                                                                 
    })

    ->withExceptions(function (Exceptions $exceptions): void {
    //
    })->create();
