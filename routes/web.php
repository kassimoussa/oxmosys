<?php

use App\Http\Controllers\PageController;
use App\Http\Middleware\Honeypot;
use Illuminate\Support\Facades\Route;

Route::get('/',                         [PageController::class, 'home'])->name('home');
Route::get('/services',                 [PageController::class, 'services'])->name('services');
Route::get('/a-propos',                 [PageController::class, 'about'])->name('about');
Route::get('/contact',                  [PageController::class, 'contact'])->name('contact');
Route::get('/devis',                    [PageController::class, 'devis'])->name('devis');
Route::get('/mentions-legales',              [PageController::class, 'mentionsLegales'])->name('mentions-legales');
Route::get('/politique-de-confidentialite', [PageController::class, 'confidentialite'])->name('confidentialite');
Route::get('/sitemap.xml',                  [PageController::class, 'sitemap'])->name('sitemap');

Route::post('/contact', [PageController::class, 'sendContact'])
    ->name('contact.send')
    ->middleware(['throttle:contact-form', Honeypot::class]);

Route::post('/devis', [PageController::class, 'sendDevis'])
    ->name('devis.send')
    ->middleware(['throttle:devis-form', Honeypot::class]);
