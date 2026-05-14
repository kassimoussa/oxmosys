@extends('layouts.app')

@section('title', 'Nos Services')
@section('meta_description', 'Découvrez tous les services IT d\'OXMOSYS-TECH : cybersécurité, Microsoft 365, Kaspersky, infrastructure réseau, cloud computing et développement web.')

@section('content')

{{-- ===== HERO BANNER ===== --}}
<section class="bg-surface-container-low py-16 border-b border-primary-container relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none opacity-20"
         style="background-image: radial-gradient(circle at top right, #1b3a8a, transparent 50%);"></div>
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop relative z-10">

        <nav aria-label="Fil d'Ariane"
             class="hero-el hero-fade-down hero-d0 flex text-on-surface-variant font-label-sm text-label-sm mb-4">
            <ol class="inline-flex items-center gap-2">
                <li><a href="{{ route('home') }}" class="hover:text-secondary transition-colors">Accueil</a></li>
                <li class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-base">chevron_right</span>
                    <span class="text-secondary-container">Services</span>
                </li>
            </ol>
        </nav>

        <h1 class="hero-el hero-fade-up hero-d1 font-headline-xl text-headline-xl-mobile md:text-headline-xl
                   font-extrabold text-on-surface tracking-tight">
            Nos Services
        </h1>
        <p class="hero-el hero-fade-up hero-d2 font-body-lg text-body-lg text-on-surface-variant mt-4 max-w-2xl">
            Solutions technologiques avancées pour sécuriser, optimiser et propulser votre infrastructure d'entreprise.
        </p>
    </div>
</section>

{{-- ===== SERVICES DÉTAILLÉS (3 premiers, alternés) ===== --}}
<section class="py-16">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop flex flex-col gap-8 md:gap-16">
        @foreach(array_slice($services, 0, 3) as $i => $service)
            @php
                $reverse   = $i % 2 !== 0;
                $animDir   = $reverse ? 'fade-right' : 'fade-left';
                $animDelay = 0;
            @endphp
            <div data-animate="{{ $animDir }}"
                 class="group relative bg-surface border border-primary-container
                        hover:border-secondary-container transition-colors duration-300 overflow-hidden
                        grid grid-cols-1 md:grid-cols-12">
                <div class="absolute top-0 right-0 w-2 h-2 bg-secondary-container
                            opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                {{-- Icon panel --}}
                <div class="{{ $reverse ? 'md:col-span-5 md:order-2 md:border-l' : 'md:col-span-5 md:order-1 md:border-r' }}
                            border-b md:border-b-0 border-primary-container
                            bg-surface-container-lowest p-8 flex items-center justify-center
                            group-hover:bg-primary-container/10 transition-colors">
                    <span class="material-symbols-outlined text-secondary-container
                                 transition-transform duration-500 group-hover:scale-110"
                          style="font-size: 96px;">{{ $service['icon'] }}</span>
                </div>

                {{-- Text panel --}}
                <div class="{{ $reverse ? 'md:col-span-7 md:order-1' : 'md:col-span-7 md:order-2' }}
                            p-8 flex flex-col justify-center">
                    <h2 class="font-headline-lg text-headline-lg font-bold text-on-surface mb-4
                               group-hover:text-secondary transition-colors duration-300">
                        {{ $service['title'] }}
                    </h2>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-6">
                        {{ $service['details'] }}
                    </p>
                    <ul class="flex flex-col gap-2 mb-8">
                        @foreach($service['features'] as $fi => $feature)
                            <li class="flex items-start gap-2 font-body-md text-body-md text-on-surface"
                                style="transition-delay: {{ $fi * 80 }}ms">
                                <span class="material-symbols-outlined text-secondary-container mt-0.5"
                                      style="font-size:18px;">chevron_right</span>
                                {{ $feature }}
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('contact') }}"
                       class="btn-ripple inline-flex items-center gap-2 font-label-sm text-label-sm
                              text-secondary-container hover:text-secondary transition-colors uppercase
                              tracking-widest w-fit">
                        Nous contacter
                        <span class="material-symbols-outlined text-base">arrow_forward</span>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>

{{-- ===== AUTRES SERVICES (grille) ===== --}}
<section class="bg-surface-container-lowest border-y border-primary-container py-16">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
        <div data-animate="fade-up" class="mb-12 flex flex-col gap-4">
            <h2 class="font-headline-lg text-headline-lg font-bold text-on-surface">Toutes nos expertises</h2>
            <div class="w-16 h-1 bg-secondary-container"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
            @foreach(array_slice($services, 3) as $i => $service)
                <div data-animate="zoom-in" data-delay="{{ $i * 100 }}"
                     class="tilt-card group relative bg-surface border border-primary-container p-6
                            hover:border-secondary-container transition-all duration-300">
                    <div class="absolute top-0 right-0 w-2 h-2 bg-secondary-container
                                opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <span class="material-symbols-outlined text-secondary-container mb-4 block
                                 transition-transform duration-300 group-hover:scale-110"
                          style="font-size: 40px;">{{ $service['icon'] }}</span>
                    <h3 class="font-headline-md text-headline-md font-bold text-on-surface mb-2
                               group-hover:text-secondary transition-colors duration-300">
                        {{ $service['title'] }}
                    </h3>
                    <p class="font-body-md text-body-md text-on-surface-variant mb-4">
                        {{ $service['description'] }}
                    </p>
                    <ul class="flex flex-col gap-1">
                        @foreach($service['features'] as $feature)
                            <li class="flex items-start gap-2 font-body-md text-body-md text-on-surface-variant opacity-80">
                                <span class="material-symbols-outlined text-secondary-container/70 mt-0.5"
                                      style="font-size:14px;">chevron_right</span>
                                {{ $feature }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== FAQ ===== --}}
<section class="py-24 max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">

    <div data-animate="fade-up" class="mb-12 flex flex-col gap-4">
        <h2 class="font-headline-lg text-headline-lg font-bold text-on-surface">Questions fréquentes</h2>
        <div class="w-16 h-1 bg-secondary-container"></div>
    </div>

    <div class="flex flex-col gap-3" data-animate="fade-up">
        @foreach(config('oxmosys.faq') as $i => $item)
            <div class="faq-item border border-primary-container transition-colors duration-300
                        hover:border-secondary-container relative">
                {{-- Accent coin --}}
                <div class="absolute top-0 right-0 w-2 h-2 bg-transparent
                            transition-colors duration-300 faq-corner"></div>

                <button class="faq-question w-full flex items-center justify-between gap-4
                               p-5 md:p-6 text-left cursor-pointer group">
                    <span class="font-body-lg text-body-lg font-bold text-on-surface
                                 group-hover:text-secondary transition-colors pr-4">
                        {{ $item['question'] }}
                    </span>
                    <span class="material-symbols-outlined faq-icon text-secondary-container shrink-0
                                 transition-transform duration-300"
                          style="font-size:24px;">add</span>
                </button>

                <div class="faq-answer hidden border-t border-primary-container/50 px-5 md:px-6 pb-6 pt-4">
                    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                        {{ $item['answer'] }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</section>

@push('styles')
<style>
.faq-open { border-color: var(--color-secondary-container); }
.faq-open .faq-corner { background-color: var(--color-secondary-container); }
.faq-open .faq-icon { transform: rotate(45deg); }
</style>
@endpush

{{-- ===== CTA ===== --}}
<section class="py-24 max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
    <div data-animate="zoom-in"
         class="bg-linear-to-br from-secondary-container to-primary-container
                border border-primary-container relative overflow-hidden p-12 text-center">
        <div class="absolute inset-0 opacity-10 pointer-events-none"
             style="background-image: linear-gradient(45deg, transparent 25%, rgba(255,255,255,0.15) 50%, transparent 75%);
                    background-size: 20px 20px;"></div>
        <div class="relative z-10 max-w-2xl mx-auto flex flex-col items-center gap-6">
            <h2 data-animate="fade-up" class="font-headline-lg text-headline-lg font-bold text-white">
                Besoin d'un service sur mesure&nbsp;?
            </h2>
            <p data-animate="fade-up" data-delay="150"
               class="font-body-lg text-body-lg text-white/90">
                Contactez nos experts pour un audit gratuit de votre infrastructure IT.
            </p>
            <a data-animate="fade-up" data-delay="300"
               href="{{ route('contact') }}"
               class="btn-ripple mt-4 inline-block bg-background text-on-background font-bold px-8 py-3
                      border border-white/30 hover:bg-surface-container-low transition-colors rounded-md">
                Demander un audit
            </a>
        </div>
    </div>
</section>

@endsection
