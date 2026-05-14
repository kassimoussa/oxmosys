@extends('layouts.app')

@section('title', 'Accueil')
@section('meta_description', 'OXMOSYS-TECH — Votre partenaire IT de confiance à Djibouti. Cybersécurité, infrastructure réseau, Microsoft 365 et développement digital.')

@section('content')

{{-- ===== HERO ===== --}}
<header class="relative py-24 lg:py-32 overflow-hidden border-b border-primary-container circuit-bg">

    {{-- Radial glow --}}
    <div class="absolute inset-0 pointer-events-none opacity-20"
         style="background-image: radial-gradient(circle at top right, #1b3a8a, transparent 55%);"></div>

    <div class="relative z-10 max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop
                grid grid-cols-1 lg:grid-cols-12 gap-gutter items-center">

        {{-- Text block --}}
        <div class="lg:col-span-8 flex flex-col gap-6">
            <div class="hero-el hero-fade-down hero-d0 inline-block px-3 py-1 border border-primary-container
                        bg-surface-container-low text-primary font-label-sm text-label-sm w-fit uppercase tracking-widest">
                DJIBOUTI TECH HUB
            </div>
            <h1 class="hero-el hero-fade-up hero-d1 font-headline-xl text-headline-xl-mobile md:text-headline-xl
                       font-extrabold text-on-surface tracking-tight">
                {{ $company['tagline'] }}
            </h1>
            <p class="hero-el hero-fade-up hero-d2 font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
                {{ $company['description'] }}
            </p>
            <div class="hero-el hero-fade-up hero-d3 flex flex-col sm:flex-row gap-4 mt-4">
                <a href="{{ route('devis') }}"
                   class="btn-ripple inline-flex items-center justify-center gap-2 bg-secondary-container
                          text-white font-bold px-6 py-3 rounded-md hover:bg-opacity-90 transition-colors">
                    Démarrer un projet
                    <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1;">arrow_forward</span>
                </a>
                <a href="{{ route('services') }}"
                   class="inline-flex items-center justify-center bg-transparent border border-primary-container
                          text-on-surface font-bold px-6 py-3 rounded-md hover:border-secondary-container
                          hover:text-secondary-container transition-colors">
                    Découvrir nos services
                </a>
            </div>
        </div>

        {{-- Illustration réseau animée --}}
        <div class="lg:col-span-4 hidden lg:flex items-center justify-center"
             style="animation: heroFadeIn 1s ease 0.4s both;">
            <svg viewBox="0 0 380 360" xmlns="http://www.w3.org/2000/svg"
                 class="w-full max-w-xs xl:max-w-sm" style="overflow:visible;"
                 aria-label="Illustration réseau OXMOSYS-TECH">
                <style>
                    .nl { stroke-dasharray: 7 5; animation: dashFlow 3s linear infinite; }
                    .nl2 { animation-delay: -1.5s; }
                    .nl3 { animation-delay: -1s; }
                    .nl4 { animation-delay: -0.5s; }
                    @keyframes dashFlow { to { stroke-dashoffset: -48; } }
                    .np { animation: nodePulse 3.5s ease-in-out infinite; }
                    @keyframes nodePulse { 0%,100%{opacity:.85} 50%{opacity:1} }
                    .ring { animation: ringPulse 3s ease-out infinite; transform-origin: 190px 175px; }
                    @keyframes ringPulse { 0%{r:40;opacity:.5} 100%{r:70;opacity:0} }
                </style>

                {{-- Lignes de connexion --}}
                <path id="p1" d="M75,80 L190,175"  fill="none" stroke="#1b3a8a" stroke-width="1.5" class="nl"/>
                <path id="p2" d="M305,80 L190,175" fill="none" stroke="#1b3a8a" stroke-width="1.5" class="nl nl2"/>
                <path id="p3" d="M190,175 L75,280" fill="none" stroke="#1b3a8a" stroke-width="1.5" class="nl nl3"/>
                <path id="p4" d="M190,175 L305,280" fill="none" stroke="#1b3a8a" stroke-width="1.5" class="nl nl4"/>
                <path id="p5" d="M75,80 L305,80"   fill="none" stroke="#1b3a8a" stroke-width="1" stroke-dasharray="4 7" opacity=".4"/>
                <path id="p6" d="M75,280 L305,280"  fill="none" stroke="#1b3a8a" stroke-width="1" stroke-dasharray="4 7" opacity=".4"/>

                {{-- Paquets de données animés --}}
                <circle r="5" fill="#e1721a" opacity=".95" style="filter:drop-shadow(0 0 4px #e1721a)">
                    <animateMotion dur="2.8s" repeatCount="indefinite"><mpath href="#p1"/></animateMotion>
                </circle>
                <circle r="5" fill="#3cd7ff" opacity=".9" style="filter:drop-shadow(0 0 4px #3cd7ff)">
                    <animateMotion dur="3.2s" repeatCount="indefinite" begin="-1.6s"><mpath href="#p2"/></animateMotion>
                </circle>
                <circle r="4" fill="#e1721a" opacity=".85" style="filter:drop-shadow(0 0 3px #e1721a)">
                    <animateMotion dur="3s" repeatCount="indefinite" begin="-0.8s"><mpath href="#p3"/></animateMotion>
                </circle>
                <circle r="4" fill="#3cd7ff" opacity=".85" style="filter:drop-shadow(0 0 3px #3cd7ff)">
                    <animateMotion dur="3.4s" repeatCount="indefinite" begin="-0.4s"><mpath href="#p4"/></animateMotion>
                </circle>

                {{-- Anneau pulsant du hub --}}
                <circle cx="190" cy="175" r="40" fill="none" stroke="#e1721a" stroke-width="1.5" class="ring"/>

                {{-- Nœud central — HUB --}}
                <circle cx="190" cy="175" r="38" fill="#e1721a" opacity=".95"/>
                <circle cx="190" cy="175" r="7" fill="white"/>
                <line x1="190" y1="152" x2="190" y2="165" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                <line x1="190" y1="185" x2="190" y2="198" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                <line x1="167" y1="175" x2="180" y2="175" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                <line x1="200" y1="175" x2="213" y2="175" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                <text x="190" y="228" text-anchor="middle" fill="#e1721a"
                      font-family="'JetBrains Mono',monospace" font-size="9" letter-spacing="1" font-weight="700">
                    HUB RÉSEAU
                </text>

                {{-- Nœud SERVEUR (haut gauche) --}}
                <circle cx="75" cy="80" r="30" fill="#1b3a8a" class="np"/>
                <rect x="62" y="68" width="26" height="5" rx="1" fill="#b5c4ff" opacity=".9"/>
                <rect x="62" y="76" width="26" height="5" rx="1" fill="#b5c4ff" opacity=".7"/>
                <rect x="62" y="84" width="26" height="5" rx="1" fill="#b5c4ff" opacity=".5"/>
                <text x="75" y="124" text-anchor="middle" fill="#c4c6d3"
                      font-family="'JetBrains Mono',monospace" font-size="8" letter-spacing="1">SERVEUR</text>

                {{-- Nœud CLOUD (haut droite) --}}
                <circle cx="305" cy="80" r="30" fill="#1b3a8a" class="np" style="animation-delay:-.7s"/>
                <path d="M289,86 Q289,77 297,77 Q298,70 306,70 Q314,70 316,77 Q323,77 323,86 Z"
                      fill="#b5c4ff" opacity=".85"/>
                <text x="305" y="124" text-anchor="middle" fill="#c4c6d3"
                      font-family="'JetBrains Mono',monospace" font-size="8" letter-spacing="1">CLOUD</text>

                {{-- Nœud SÉCURITÉ (bas gauche) --}}
                <circle cx="75" cy="280" r="30" fill="#1b3a8a" class="np" style="animation-delay:-1.2s"/>
                <path d="M75,265 L88,270 L88,283 Q88,292 75,297 Q62,292 62,283 L62,270 Z"
                      fill="none" stroke="#b5c4ff" stroke-width="2" opacity=".85"/>
                <line x1="75" y1="274" x2="75" y2="289" stroke="#b5c4ff" stroke-width="1.5" opacity=".6"/>
                <text x="75" y="324" text-anchor="middle" fill="#c4c6d3"
                      font-family="'JetBrains Mono',monospace" font-size="8" letter-spacing="1">SÉCURITÉ</text>

                {{-- Nœud ENDPOINT (bas droite) --}}
                <circle cx="305" cy="280" r="30" fill="#1b3a8a" class="np" style="animation-delay:-1.8s"/>
                <rect x="290" y="269" width="30" height="19" rx="2" fill="none" stroke="#b5c4ff" stroke-width="2" opacity=".85"/>
                <line x1="305" y1="288" x2="305" y2="294" stroke="#b5c4ff" stroke-width="2"/>
                <line x1="298" y1="294" x2="312" y2="294" stroke="#b5c4ff" stroke-width="2"/>
                <text x="305" y="324" text-anchor="middle" fill="#c4c6d3"
                      font-family="'JetBrains Mono',monospace" font-size="8" letter-spacing="1">ENDPOINT</text>
            </svg>
        </div>
    </div>

    {{-- Stats strip --}}
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop mt-16 lg:mt-24 relative z-10">
        <div data-animate="fade-up"
             class="grid grid-cols-1 md:grid-cols-3 gap-6
                    bg-surface-container border border-primary-container p-8">
            @foreach($stats as $i => $stat)
                <div class="{{ $i > 0 ? 'md:border-l border-primary-container md:pl-6' : '' }}
                             flex flex-col gap-2"
                     data-animate="fade-up" data-delay="{{ $i * 150 }}">
                    <span class="font-headline-lg text-headline-lg font-bold text-secondary-container"
                          data-counter data-target="{{ $stat['value'] }}">
                        {{ $stat['value'] }}
                    </span>
                    <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest">
                        {{ $stat['label'] }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>
</header>

{{-- ===== SERVICES ===== --}}
<section class="py-24 max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">

    <div data-animate="fade-up" class="mb-12 flex flex-col gap-4">
        <h2 class="font-headline-lg text-headline-lg font-bold text-on-surface">Nos Services</h2>
        <div class="w-16 h-1 bg-secondary-container"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
        @foreach($services as $i => $service)
            @php
                $delays = [0, 100, 200, 300, 400, 500, 600, 700, 800];
                $delay  = $delays[$i % count($delays)];
            @endphp
            <div data-animate="zoom-in" data-delay="{{ $delay }}"
                 class="tilt-card group relative bg-surface-container-low border border-primary-container p-6
                        hover:border-secondary-container transition-all duration-300 cursor-pointer">
                <div class="absolute top-0 right-0 w-2 h-2 bg-secondary-container
                            opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <span class="material-symbols-outlined text-secondary-container mb-4 block
                             transition-transform duration-300 group-hover:scale-110"
                      style="font-size: 40px;">{{ $service['icon'] }}</span>
                <h3 class="font-headline-md text-headline-md font-bold text-on-surface mb-2
                           group-hover:text-secondary transition-colors duration-300">
                    {{ $service['title'] }}
                </h3>
                <p class="font-body-md text-body-md text-on-surface-variant">
                    {{ $service['description'] }}
                </p>
            </div>
        @endforeach
    </div>

    <div data-animate="fade-up" class="mt-12 text-center">
        <a href="{{ route('services') }}"
           class="btn-ripple inline-flex items-center gap-2 font-label-sm text-label-sm
                  text-secondary-container hover:text-secondary transition-colors uppercase tracking-widest
                  border border-primary-container hover:border-secondary px-8 py-4
                  hover:bg-primary-container/10">
            Voir tous nos services
            <span class="material-symbols-outlined text-base">arrow_forward</span>
        </a>
    </div>
</section>

{{-- ===== PARTNERS — Carousel infini ===== --}}
<section class="py-14 bg-surface-container-highest border-y border-primary-container overflow-hidden">

    <h3 data-animate="fade-in"
        class="font-label-sm text-label-sm text-center text-on-surface-variant mb-10 uppercase tracking-widest">
        Nos Partenaires Technologiques
    </h3>

    <div class="relative"
         style="mask-image: linear-gradient(to right, transparent 0%, black 10%, black 90%, transparent 100%);
                -webkit-mask-image: linear-gradient(to right, transparent 0%, black 10%, black 90%, transparent 100%);">
        <div class="flex items-center gap-16 animate-marquee">
            @foreach([$partners, $partners] as $set)
                @foreach($set as $partner)
                    <div class="shrink-0 flex items-center justify-center"
                         style="min-width:120px; height:56px;"
                         title="{{ $partner['description'] }}">
                        <img src="{{ asset($partner['logo']) }}"
                             alt="{{ $partner['name'] }}"
                             class="partner-logo max-h-10 w-auto cursor-default select-none"
                             draggable="false" loading="lazy">
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</section>

{{-- ===== ILS NOUS FONT CONFIANCE ===== --}}
<section class="py-24 bg-surface-container-lowest border-y border-primary-container">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">

        <div data-animate="fade-up" class="mb-14 flex flex-col items-center gap-3 text-center">
            <span class="font-label-sm text-label-sm text-tertiary uppercase tracking-widest">
                Références
            </span>
            <h2 class="font-headline-lg text-headline-lg font-bold text-on-surface">
                Ils nous font confiance
            </h2>
            <div class="w-16 h-1 bg-secondary-container"></div>
            <p class="font-body-md text-body-md text-on-surface-variant max-w-xl mt-2">
                Des organisations djiboutiennes de premier plan nous confient leur infrastructure IT.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach(config('oxmosys.clients') as $i => $client)
                <div data-animate="zoom-in" data-delay="{{ $i * 100 }}"
                     class="group relative bg-surface border border-primary-container
                            hover:border-secondary-container transition-all duration-300 flex flex-col
                            card-lift overflow-hidden">

                    {{-- Accent coin --}}
                    <div class="absolute top-0 right-0 w-2 h-2 bg-secondary-container
                                opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10"></div>

                    {{-- Zone logo — fond blanc fixe, toutes les images font 480×240 px --}}
                    <div class="bg-white border-b border-primary-container/20 overflow-hidden">
                        <img src="{{ asset($client['logo']) }}"
                             alt="{{ $client['name'] }} — {{ $client['full'] }}"
                             class="w-full h-auto transition-transform duration-300 group-hover:scale-105"
                             width="480" height="240"
                             loading="lazy">
                    </div>

                    {{-- Infos --}}
                    <div class="p-4 flex flex-col gap-2 grow">
                        <p class="font-body-md text-body-md font-bold text-on-surface
                                  group-hover:text-secondary transition-colors duration-300 leading-tight">
                            {{ $client['name'] }}
                        </p>
                        <p class="font-label-sm text-label-sm text-on-surface-variant leading-snug">
                            {{ $client['full'] }}
                        </p>
                        <span class="font-label-sm text-label-sm text-secondary-container uppercase
                                     tracking-wider mt-auto pt-2 border-t border-primary-container/30">
                            {{ $client['sector'] }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

{{-- ===== CTA BANNER ===== --}}
<section class="py-24 max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
    <div data-animate="zoom-in"
         class="bg-linear-to-br from-secondary-container to-primary-container
                border border-primary-container relative overflow-hidden p-12 text-center">
        <div class="absolute inset-0 opacity-10 pointer-events-none"
             style="background-image: linear-gradient(45deg, transparent 25%, rgba(255,255,255,0.15) 50%, transparent 75%);
                    background-size: 20px 20px;"></div>
        <div class="relative z-10 max-w-2xl mx-auto flex flex-col items-center gap-6">
            <h2 data-animate="fade-up"
                class="font-headline-lg text-headline-lg font-bold text-white">
                Prêt à sécuriser et optimiser votre infrastructure&nbsp;?
            </h2>
            <p data-animate="fade-up" data-delay="150"
               class="font-body-lg text-body-lg text-white/90">
                Nos experts sont à votre disposition pour évaluer vos besoins
                et concevoir une architecture IT sur mesure.
            </p>
            <a data-animate="fade-up" data-delay="300"
               href="{{ route('contact') }}"
               class="btn-ripple mt-4 inline-block bg-background text-on-background font-bold px-8 py-3
                      border border-white/30 hover:bg-surface-container-low transition-colors rounded-md">
                Contactez-nous
            </a>
        </div>
    </div>
</section>

@endsection
