@php
    $company = config('oxmosys.company');
    $links = [
        ['route' => 'home',     'label' => 'Accueil'],
        ['route' => 'services', 'label' => 'Services'],
        ['route' => 'about',    'label' => 'À propos'],
        ['route' => 'contact',  'label' => 'Contact'],
    ];
@endphp

<footer class="bg-surface-container-lowest border-t border-primary-container py-12 mt-auto">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            {{-- Brand & description --}}
            <div class="flex flex-col gap-4">
                <a href="{{ route('home') }}" class="flex items-center gap-3 hover:opacity-85 transition-opacity w-fit">
                    <img src="{{ asset('images/logo.png') }}"
                         alt="OXMOSYS-TECH"
                         class="h-10 w-auto"
                         width="40" height="40">
                    <span class="font-headline-md text-headline-md font-extrabold text-on-surface">
                        OXMOSYS-TECH
                    </span>
                </a>
                <p class="font-body-md text-body-md text-on-surface-variant max-w-xs">
                    Solutions technologiques avancées pour entreprises performantes à Djibouti et dans la région.
                </p>
                <p class="font-label-sm text-label-sm text-outline mt-2">
                    {{ $company['copyright'] }}
                </p>
            </div>

            {{-- Navigation --}}
            <div class="flex flex-col gap-3">
                <h3 class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest mb-2">Navigation</h3>
                @foreach($links as $link)
                    <a href="{{ route($link['route']) }}"
                       class="font-body-md text-body-md {{ request()->routeIs($link['route']) ? 'text-secondary' : 'text-on-surface-variant hover:text-secondary' }} transition-colors w-fit">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>

            {{-- Legal & contact --}}
            <div class="flex flex-col gap-3">
                <h3 class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest mb-2">Légal & Contact</h3>
                <a href="{{ route('mentions-legales') }}"
                   class="font-body-md text-body-md {{ request()->routeIs('mentions-legales') ? 'text-secondary' : 'text-on-surface-variant hover:text-secondary' }} transition-colors w-fit">
                    Mentions légales
                </a>
                <a href="{{ route('confidentialite') }}"
                   class="font-body-md text-body-md {{ request()->routeIs('confidentialite') ? 'text-secondary' : 'text-on-surface-variant hover:text-secondary' }} transition-colors w-fit">
                    Politique de confidentialité
                </a>
                <a href="mailto:{{ $company['email'] }}"
                   class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors w-fit">
                    {{ $company['email'] }}
                </a>
                <a href="tel:{{ preg_replace('/\s+/', '', $company['phone']) }}"
                   class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors w-fit">
                    {{ $company['phone'] }}
                </a>
            </div>
        </div>

        {{-- Bottom bar --}}
        {{-- <div class="mt-8 pt-8 border-t border-primary-container flex flex-col sm:flex-row justify-between items-center gap-4">
            <p class="font-label-sm text-label-sm text-outline">
                {{ $company['copyright'] }}
            </p>
            <p class="font-label-sm text-label-sm text-outline">
                Conçu et développé à Djibouti
            </p>
        </div> --}}
    </div>
</footer>
