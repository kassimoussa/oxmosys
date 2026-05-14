<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        // ── Rate limiting des formulaires ────────────────────────────────────
        // Formulaire contact : 5 soumissions max toutes les 10 minutes par IP.
        RateLimiter::for('contact-form', function (Request $request) {
            return Limit::perMinutes(10, 5)->by($request->ip());
        });

        // Formulaire devis : 3 soumissions max toutes les 15 minutes par IP.
        // Un devis est une demande commerciale, volume naturellement plus bas.
        RateLimiter::for('devis-form', function (Request $request) {
            return Limit::perMinutes(15, 3)->by($request->ip());
        });
    }
}
