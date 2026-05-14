<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- ===== Titre & description ===== --}}
    @php
        $pageTitle  = trim(strip_tags(View::yieldContent('title', '')));
        $fullTitle  = $pageTitle ? "$pageTitle — OXMOSYS-TECH" : 'OXMOSYS-TECH — Solutions IT à Djibouti';
        $metaDesc   = trim(strip_tags(View::yieldContent('meta_description',
            'OXMOSYS-TECH — Votre partenaire IT de confiance à Djibouti. Cybersécurité, infrastructure réseau, Microsoft 365 et développement digital.')));
        $ogImage    = trim(View::yieldContent('og_image', config('app.url') . '/images/logo.png'));
        $canonical  = url()->current();
    @endphp

    <title>{{ $fullTitle }}</title>
    <meta name="description" content="{{ $metaDesc }}">
    <link rel="canonical" href="{{ $canonical }}">

    {{-- ===== Open Graph (LinkedIn, WhatsApp, Facebook…) ===== --}}
    <meta property="og:type"        content="website">
    <meta property="og:url"         content="{{ $canonical }}">
    <meta property="og:title"       content="{{ $fullTitle }}">
    <meta property="og:description" content="{{ $metaDesc }}">
    <meta property="og:image"       content="{{ $ogImage }}">
    <meta property="og:image:width"  content="512">
    <meta property="og:image:height" content="512">
    <meta property="og:locale"      content="fr_DJ">
    <meta property="og:site_name"   content="OXMOSYS-TECH">

    {{-- ===== Twitter / X Card ===== --}}
    <meta name="twitter:card"        content="summary">
    <meta name="twitter:title"       content="{{ $fullTitle }}">
    <meta name="twitter:description" content="{{ $metaDesc }}">
    <meta name="twitter:image"       content="{{ $ogImage }}">

    {{-- ===== Favicons ===== --}}
    <link rel="icon"             type="image/x-icon"       href="{{ asset('favicon.ico') }}">
    <link rel="icon"             type="image/png" sizes="16x16"  href="{{ asset('favicon-16x16.png') }}">
    <link rel="icon"             type="image/png" sizes="32x32"  href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon"             type="image/png" sizes="96x96"  href="{{ asset('favicon-96x96.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"               href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon"             type="image/png" sizes="192x192" href="{{ asset('favicon-192x192.png') }}">
    <link rel="icon"             type="image/png" sizes="512x512" href="{{ asset('favicon-512x512.png') }}">
    <meta name="theme-color" content="#0e1322">

    {{-- ===== Anti-FOUC : thème dark/light avant le premier rendu ===== --}}
    <script>
        (function () {
            var saved = localStorage.getItem('oxmosys-theme');
            if (saved !== 'light') {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    {{-- ===== Google Fonts ===== --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="bg-background text-on-background font-body-md text-body-md antialiased min-h-screen flex flex-col circuit-bg">

    <x-navbar />

    <main class="grow pt-20">
        @yield('content')
    </main>

    <x-footer />

    {{-- ===== WhatsApp floating button ===== --}}
    <x-whatsapp-button />

    {{-- ===== Back to top button ===== --}}
    <button id="back-to-top"
            aria-label="Retour en haut"
            title="Retour en haut"
            class="fixed bottom-24 right-6 z-50 w-11 h-11 flex items-center justify-center
                   bg-surface-container border border-primary-container text-on-surface-variant
                   hover:border-secondary-container hover:text-secondary-container
                   transition-all duration-300 opacity-0 pointer-events-none translate-y-4
                   shadow-lg">
        <span class="material-symbols-outlined" style="font-size:20px;">arrow_upward</span>
    </button>

    @stack('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btn  = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            const icon = document.getElementById('mobile-menu-icon');
            if (btn && menu) {
                btn.addEventListener('click', function () {
                    const isHidden = menu.classList.toggle('hidden');
                    if (icon) icon.textContent = isHidden ? 'menu' : 'close';
                });
            }
        });
    </script>
</body>
</html>
