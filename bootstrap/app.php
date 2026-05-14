<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {

        // Quand le rate limit est dépassé sur un formulaire web, on redirige
        // avec un message clair plutôt que d'afficher une page d'erreur 429.
        $exceptions->render(function (ThrottleRequestsException $e, Request $request) {
            if ($request->expectsJson()) {
                return null; // Laisser le comportement JSON par défaut
            }

            $retryAfter = (int) $e->getHeaders()['Retry-After'] ?? 60;
            $minutes    = max(1, (int) ceil($retryAfter / 60));
            $label      = $minutes === 1 ? '1 minute' : "$minutes minutes";

            return redirect()->back()
                ->withInput()
                ->with('error', "Trop de tentatives. Merci de patienter $label avant de réessayer.");
        });

    })->create();
