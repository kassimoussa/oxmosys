@extends('layouts.app')

@section('title', 'Page introuvable')
@section('meta_description', 'La page que vous recherchez n\'existe pas ou a été déplacée.')

@section('content')

<div class="min-h-[70vh] flex items-center justify-center px-margin-mobile md:px-margin-desktop">
    <div class="max-w-2xl w-full text-center">

        {{-- Code d'erreur --}}
        <div class="hero-el hero-fade-in hero-d0 relative mb-6 select-none" aria-hidden="true">
            <span class="text-[10rem] md:text-[14rem] font-extrabold leading-none
                         text-primary-container/20 font-headline-xl block">
                404
            </span>
            <div class="absolute inset-0 flex items-center justify-center">
                <span class="material-symbols-outlined text-secondary-container"
                      style="font-size: 80px; font-variation-settings:'FILL' 1;">
                    search_off
                </span>
            </div>
        </div>

        {{-- Message --}}
        <h1 class="hero-el hero-fade-up hero-d1 font-headline-lg text-headline-lg font-bold
                   text-on-surface mb-4">
            Page introuvable
        </h1>
        <p class="hero-el hero-fade-up hero-d2 font-body-lg text-body-lg text-on-surface-variant
                   mb-10 max-w-lg mx-auto">
            La page que vous recherchez n'existe pas, a été déplacée ou l'URL est incorrecte.
        </p>

        {{-- Actions --}}
        <div class="hero-el hero-fade-up hero-d3 flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('home') }}"
               class="btn-ripple inline-flex items-center justify-center gap-2
                      bg-secondary-container text-white font-bold px-6 py-3 rounded-md
                      hover:bg-opacity-90 transition-colors">
                <span class="material-symbols-outlined text-base"
                      style="font-variation-settings:'FILL' 1;">home</span>
                Retour à l'accueil
            </a>
            <a href="{{ route('contact') }}"
               class="inline-flex items-center justify-center gap-2 border border-primary-container
                      text-on-surface font-bold px-6 py-3 rounded-md
                      hover:border-secondary-container hover:text-secondary-container transition-colors">
                <span class="material-symbols-outlined text-base">mail</span>
                Nous contacter
            </a>
        </div>

        {{-- Liens rapides --}}
        <div class="hero-el hero-fade-up hero-d4 mt-16 pt-10 border-t border-primary-container/30">
            <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest mb-6">
                Peut-être cherchiez-vous…
            </p>
            <div class="flex flex-wrap justify-center gap-3">
                @foreach([
                    ['route' => 'services', 'label' => 'Nos Services',    'icon' => 'build'],
                    ['route' => 'about',    'label' => 'À propos',         'icon' => 'info'],
                    ['route' => 'devis',    'label' => 'Demander un devis','icon' => 'request_quote'],
                    ['route' => 'contact',  'label' => 'Contact',          'icon' => 'mail'],
                ] as $link)
                    <a href="{{ route($link['route']) }}"
                       class="inline-flex items-center gap-2 bg-surface-container border border-primary-container
                              text-on-surface-variant hover:text-secondary hover:border-secondary
                              font-body-md text-body-md px-4 py-2 transition-colors">
                        <span class="material-symbols-outlined text-base">{{ $link['icon'] }}</span>
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>
        </div>

    </div>
</div>

@endsection
