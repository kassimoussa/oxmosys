@php
    $links = [
        ['route' => 'home',     'label' => 'Accueil'],
        ['route' => 'services', 'label' => 'Services'],
        ['route' => 'about',    'label' => 'À propos'],
        ['route' => 'contact',  'label' => 'Contact'],
    ];
@endphp

<header class="fixed top-0 w-full z-50 bg-surface border-b border-primary-container transition-all duration-300 ease-in-out">
    <div class="flex justify-between items-center h-20 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">

        {{-- Brand --}}
        <a href="{{ route('home') }}" class="flex items-center gap-3 hover:opacity-85 transition-opacity">
            <img src="{{ asset('images/logo.png') }}"
                 alt="OXMOSYS-TECH"
                 class="h-12 w-auto"
                 width="48" height="48">
            <span class="font-headline-md text-headline-md font-bold text-on-surface hidden sm:block">
                OXMOSYS-TECH
            </span>
        </a>

        {{-- Desktop navigation --}}
        <nav class="hidden md:flex items-center gap-6" aria-label="Navigation principale">
            @foreach($links as $link)
                @if(request()->routeIs($link['route']))
                    <a href="{{ route($link['route']) }}"
                       class="font-body-md text-body-md text-secondary font-bold border-b-2 border-secondary pb-1 px-3 py-2"
                       aria-current="page">
                        {{ $link['label'] }}
                    </a>
                @else
                    <a href="{{ route($link['route']) }}"
                       class="font-body-md text-body-md text-on-surface-variant hover:text-secondary hover:bg-primary-container/20 transition-colors px-3 py-2 rounded-md">
                        {{ $link['label'] }}
                    </a>
                @endif
            @endforeach
        </nav>

        {{-- CTA button + theme toggle --}}
        <div class="hidden md:flex items-center gap-3">

            {{-- Theme toggle --}}
            <button id="theme-toggle"
                    aria-label="Basculer le mode clair / sombre"
                    title="Basculer le thème"
                    class="w-9 h-9 flex items-center justify-center rounded-md
                           text-on-surface-variant hover:text-secondary hover:bg-primary-container/20
                           transition-colors duration-200">
                <span id="theme-icon" class="material-symbols-outlined" style="font-size:20px;">light_mode</span>
            </button>

            <a href="{{ route('devis') }}"
               class="inline-flex items-center justify-center font-label-sm text-label-sm
                      bg-secondary-container text-white px-6 py-3 border border-secondary-container
                      hover:bg-transparent hover:text-secondary-container hover:border-secondary-container
                      transition-all duration-300 rounded-md uppercase tracking-widest">
                Demander un devis
            </a>
        </div>

        {{-- Mobile hamburger --}}
        <button id="mobile-menu-btn"
                class="md:hidden text-on-surface p-2 hover:text-secondary transition-colors"
                aria-label="Ouvrir le menu"
                aria-expanded="false"
                aria-controls="mobile-menu">
            <span id="mobile-menu-icon" class="material-symbols-outlined text-3xl">menu</span>
        </button>
    </div>

    {{-- Mobile menu --}}
    <div id="mobile-menu" class="hidden md:hidden bg-surface border-t border-primary-container">
        <nav class="flex flex-col px-margin-mobile py-4 gap-1" aria-label="Navigation mobile">
            @foreach($links as $link)
                @if(request()->routeIs($link['route']))
                    <a href="{{ route($link['route']) }}"
                       class="font-body-md text-body-md text-secondary font-bold px-4 py-3 border-l-2 border-secondary bg-primary-container/10"
                       aria-current="page">
                        {{ $link['label'] }}
                    </a>
                @else
                    <a href="{{ route($link['route']) }}"
                       class="font-body-md text-body-md text-on-surface-variant hover:text-secondary hover:bg-primary-container/20 transition-colors px-4 py-3">
                        {{ $link['label'] }}
                    </a>
                @endif
            @endforeach
            <div class="mt-4 pt-4 border-t border-primary-container flex flex-col gap-3">
                <button id="theme-toggle-mobile"
                        aria-label="Basculer le mode clair / sombre"
                        class="flex items-center gap-3 px-4 py-3 font-body-md text-body-md
                               text-on-surface-variant hover:text-secondary hover:bg-primary-container/20
                               transition-colors rounded-md w-full">
                    <span id="theme-icon-mobile" class="material-symbols-outlined" style="font-size:20px;">light_mode</span>
                    <span id="theme-label-mobile">Passer en mode clair</span>
                </button>
                <a href="{{ route('devis') }}"
                   class="inline-flex w-full items-center justify-center font-label-sm text-label-sm
                          bg-secondary-container text-white px-6 py-3 rounded-md uppercase tracking-widest
                          hover:bg-opacity-90 transition-colors">
                    Demander un devis
                </a>
            </div>
        </nav>
    </div>
</header>
