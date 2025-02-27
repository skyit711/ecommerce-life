<?php

use App\Http\Middleware\AddAcceptJsonHeader;
use App\Http\Middleware\CheckUserType;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(AddAcceptJsonHeader::class);
        //
        EnsureFrontendRequestsAreStateful::class;
        $middleware->alias([
            'checkUserType' => CheckUserType::class,
        ]);
        // AddAcceptJsonHeader::class;

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
