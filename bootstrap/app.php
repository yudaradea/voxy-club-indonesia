<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (HttpException $e, Request $request) {
            $code = $e->getStatusCode();

            if (in_array($code, [403, 404, 500, 503])) {
                return redirect()->route('error', ['code' => $code]);
            }

            // fallback untuk error lain
            return response()->view('errors.custom', [
                'code' => $code,
                'error' => ['title' => 'Error', 'message' => 'Unexpected error occurred.']
            ], $code);
        });
    })->create();
