@extends('layouts.app')

@section('title', 'À propos')
@section('meta_description', 'Découvrez OXMOSYS-TECH — notre mission, nos valeurs et l\'équipe qui pilote votre transformation numérique à Djibouti.')

@section('content')

{{-- ===== HERO ===== --}}
<header class="relative border-b border-primary-container bg-surface-container-low overflow-hidden">
    <div class="absolute inset-0 circuit-bg opacity-40 pointer-events-none"></div>
    <div class="absolute inset-0 bg-linear-to-b from-transparent to-surface-container-low pointer-events-none"></div>

    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-24 relative z-10
                flex flex-col items-start">
        <span class="hero-el hero-fade-down hero-d0 font-label-sm text-label-sm text-tertiary mb-4
                     tracking-widest uppercase border border-tertiary/30 px-3 py-1 rounded-md bg-surface/50">
            L'entreprise
        </span>
        <h1 class="hero-el hero-fade-up hero-d1 font-headline-xl text-headline-xl-mobile md:text-headline-xl
                   font-extrabold text-on-surface mb-6 max-w-3xl tracking-tight">
            L'ingénierie numérique au service de votre excellence.
        </h1>
        <p class="hero-el hero-fade-up hero-d2 font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
            OXMOSYS-TECH est le partenaire technologique de référence. Nous concevons, déployons
            et sécurisons des infrastructures IT robustes pour propulser votre entreprise dans
            l'ère numérique avec une précision implacable.
        </p>
    </div>
</header>

{{-- ===== MISSION ===== --}}
<section class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-20">
    <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter items-center">

        <div data-animate="fade-right" class="md:col-span-6 space-y-6">
            <h2 class="font-headline-lg text-headline-lg font-bold text-on-surface border-l-4 border-secondary pl-4">
                Notre Mission
            </h2>
            <div class="space-y-4 font-body-lg text-body-lg text-on-surface-variant">
                <p>
                    Fondée sur la conviction que la technologie doit être un levier de croissance fiable,
                    OXMOSYS-TECH s'engage à fournir des solutions d'ingénierie informatique de pointe.
                    Notre approche est méthodique, ancrée dans la rigueur industrielle et l'innovation constante.
                </p>
                <p>
                    Nous ne nous contentons pas de résoudre des problèmes ; nous architecturons des
                    écosystèmes numériques résilients capables de soutenir vos ambitions les plus audacieuses.
                </p>
            </div>
            <div class="flex gap-8 pt-4">
                @foreach($stats as $i => $stat)
                    <div class="flex flex-col gap-1" data-animate="fade-up" data-delay="{{ $i * 150 }}">
                        <span class="font-headline-lg text-headline-lg font-bold text-secondary-container"
                              data-counter data-target="{{ $stat['value'] }}">
                            {{ $stat['value'] }}
                        </span>
                        <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">
                            {{ $stat['label'] }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Terminal animé --}}
        <div data-animate="fade-left" class="md:col-span-6 border border-primary-container overflow-hidden"
             style="min-height: 380px;">

            {{-- Barre de titre --}}
            <div class="flex items-center gap-2 px-4 py-3 border-b border-primary-container/50"
                 style="background:#090e1c;">
                <span class="w-3 h-3 rounded-full" style="background:#ff5f56;"></span>
                <span class="w-3 h-3 rounded-full" style="background:#ffbd2e;"></span>
                <span class="w-3 h-3 rounded-full" style="background:#27c93f;"></span>
                <span class="ml-3 font-label-sm text-label-sm text-outline tracking-widest">
                    root@oxmosys — bash
                </span>
            </div>

            {{-- Corps du terminal --}}
            <div id="terminal-body"
                 class="font-mono text-sm leading-relaxed overflow-hidden p-5"
                 style="background:#090e1c; min-height:340px; color:#3cd7ff;">
            </div>
        </div>
    </div>
</section>

{{-- ===== VALEURS ===== --}}
<section class="bg-surface-container-lowest border-y border-primary-container py-20">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
        <div data-animate="fade-up" class="text-center mb-16">
            <h2 class="font-headline-lg text-headline-lg font-bold text-on-surface
                       inline-block border-b-2 border-secondary pb-2">
                Nos Valeurs Fondamentales
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter">
            @foreach($values as $i => $value)
                <div data-animate="zoom-in" data-delay="{{ $i * 120 }}"
                     class="tech-card card-lift bg-surface p-6 flex flex-col
                            {{ $i % 2 !== 0 ? 'md:translate-y-8' : '' }}">
                    <div class="text-tertiary mb-4 transition-transform duration-300 group-hover:scale-110">
                        <span class="material-symbols-outlined"
                              style="font-size: 40px; font-variation-settings:'FILL' 1;">
                            {{ $value['icon'] }}
                        </span>
                    </div>
                    <h3 class="font-headline-md text-headline-md font-bold text-on-surface mb-3">
                        {{ $value['title'] }}
                    </h3>
                    <p class="font-body-md text-body-md text-on-surface-variant grow">
                        {{ $value['description'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{--
===== ÉQUIPE DIRIGEANTE (masquée temporairement) =====
<section class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-24">
    <h2 data-animate="fade-up"
        class="font-headline-lg text-headline-lg font-bold text-on-surface mb-12 border-l-4 border-secondary pl-4">
        L'Équipe Dirigeante
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
        @foreach($team as $i => $member)
            <div data-animate="fade-up" data-delay="{{ $i * 150 }}"
                 class="card-lift tech-card bg-surface-container flex flex-col">
                <div class="h-64 border-b border-primary-container bg-surface-container-low
                            relative overflow-hidden flex items-center justify-center circuit-bg">
                    <div class="relative z-10 w-24 h-24 bg-primary-container flex items-center justify-center
                                border-2 border-secondary-container/50 transition-transform duration-500
                                group-hover:scale-110">
                        <span class="font-headline-lg text-headline-lg font-extrabold text-on-primary-container">
                            {{ $member['initials'] }}
                        </span>
                    </div>
                    <div class="absolute inset-0 pointer-events-none overflow-hidden opacity-20">
                        <div class="w-full h-0.5 bg-tertiary"
                             style="animation: scanLine 3s linear infinite {{ $i * 1 }}s;"></div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="font-headline-md text-headline-md font-bold text-on-surface mb-1">
                        {{ $member['name'] }}
                    </h3>
                    <p class="font-label-sm text-label-sm text-tertiary mb-4 uppercase tracking-wider">
                        {{ $member['role'] }}
                    </p>
                    <p class="font-body-md text-body-md text-on-surface-variant">
                        {{ $member['bio'] }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</section>
--}}

{{-- ===== CTA ===== --}}
<section data-animate="fade-up"
         class="bg-surface-container-lowest border-t border-primary-container py-16">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop text-center">
        <h2 class="font-headline-lg text-headline-lg font-bold text-on-surface mb-4">
            Rejoignez notre réseau de partenaires
        </h2>
        <p class="font-body-lg text-body-lg text-on-surface-variant mb-8 max-w-2xl mx-auto">
            Vous souhaitez travailler avec nous ou bénéficier de nos services ?
            Prenons contact pour évaluer vos besoins ensemble.
        </p>
        <a href="{{ route('contact') }}"
           class="btn-ripple inline-flex items-center gap-2 bg-secondary-container text-white font-bold
                  px-8 py-3 rounded-md hover:bg-opacity-90 transition-colors">
            Prendre contact
            <span class="material-symbols-outlined text-base"
                  style="font-variation-settings:'FILL' 1;">arrow_forward</span>
        </a>
    </div>
</section>

@push('styles')
<style>
@keyframes scanLine {
    0%   { transform: translateY(-100%); }
    100% { transform: translateY(25600%); }
}
.terminal-cursor {
    display: inline-block;
    width: 8px;
    height: 14px;
    background: #3cd7ff;
    vertical-align: middle;
    margin-left: 2px;
    animation: blink 1s step-end infinite;
}
@keyframes blink { 0%,100%{opacity:1} 50%{opacity:0} }
.term-cmd  { color: #3cd7ff; }
.term-ok   { color: #27c93f; }
.term-warn { color: #ffbd2e; }
.term-info { color: #8e909d; }
.term-prompt { color: #e1721a; font-weight: bold; }
</style>
@endpush

@push('scripts')
<script>
(function () {
    const body = document.getElementById('terminal-body');
    if (!body) return;

    const PROMPT = '<span class="term-prompt">root@oxmosys</span><span class="term-info">:~#</span> ';

    // Séquence de commandes + sorties
    const sequence = [
        { type: 'cmd',  text: 'ping -c 3 oxmosys.com' },
        { type: 'out',  text: 'PING oxmosys.com (37.187.0.1): 56 bytes', cls: 'term-info' },
        { type: 'out',  text: '64 bytes from 37.187.0.1: TTL=64 time=1.8ms', cls: 'term-ok' },
        { type: 'out',  text: '64 bytes from 37.187.0.1: TTL=64 time=2.1ms', cls: 'term-ok' },
        { type: 'out',  text: '3 packets transmitted, 3 received, 0% loss', cls: 'term-ok' },
        { type: 'blank' },
        { type: 'cmd',  text: 'systemctl status firewall' },
        { type: 'out',  text: '● firewall.service — Active (running)', cls: 'term-ok' },
        { type: 'out',  text: '  Uptime : 47d 3h 12m  |  Rules : 128', cls: 'term-info' },
        { type: 'out',  text: '  Threats blocked today : 1 247', cls: 'term-warn' },
        { type: 'blank' },
        { type: 'cmd',  text: 'nmap -sV 10.0.0.1' },
        { type: 'out',  text: 'PORT     STATE  SERVICE   VERSION', cls: 'term-info' },
        { type: 'out',  text: '22/tcp   open   ssh       OpenSSH 8.9', cls: 'term-ok' },
        { type: 'out',  text: '443/tcp  open   https     nginx 1.24', cls: 'term-ok' },
        { type: 'out',  text: '3306/tcp closed mysql', cls: 'term-warn' },
        { type: 'blank' },
        { type: 'cmd',  text: 'ssh admin@server.oxmosys.com' },
        { type: 'out',  text: 'Connecting to server.oxmosys.com...', cls: 'term-info' },
        { type: 'out',  text: 'Welcome to OXMOSYS Infrastructure', cls: 'term-ok' },
        { type: 'out',  text: 'Last login: Wed May 14 09:30 — Uptime: 47 days', cls: 'term-info' },
        { type: 'blank' },
    ];

    let seqIndex = 0;
    let charIndex = 0;
    let currentLine = null;

    function appendLine(cls = '') {
        const line = document.createElement('div');
        if (cls) line.className = cls;
        body.appendChild(line);
        return line;
    }

    function appendCursor() {
        const cursor = document.createElement('span');
        cursor.className = 'terminal-cursor';
        cursor.id = 'term-cursor';
        body.appendChild(cursor);
    }

    function removeCursor() {
        const c = document.getElementById('term-cursor');
        if (c) c.remove();
    }

    function typeNext() {
        if (seqIndex >= sequence.length) {
            // Recommence depuis le début après une pause
            setTimeout(() => {
                body.innerHTML = '';
                seqIndex = 0;
                charIndex = 0;
                currentLine = null;
                step();
            }, 2000);
            return;
        }

        const item = sequence[seqIndex];

        if (item.type === 'blank') {
            appendLine();
            seqIndex++;
            setTimeout(step, 120);
            return;
        }

        if (item.type === 'out') {
            const line = appendLine(item.cls || '');
            line.textContent = item.text;
            body.scrollTop = body.scrollHeight;
            seqIndex++;
            setTimeout(step, 80);
            return;
        }

        if (item.type === 'cmd') {
            if (charIndex === 0) {
                removeCursor();
                // Ligne de prompt
                const promptLine = document.createElement('div');
                promptLine.innerHTML = PROMPT;
                body.appendChild(promptLine);
                currentLine = document.createElement('span');
                currentLine.className = 'term-cmd';
                promptLine.appendChild(currentLine);
                appendCursor();
            }

            if (charIndex < item.text.length) {
                currentLine.textContent += item.text[charIndex];
                charIndex++;
                body.scrollTop = body.scrollHeight;
                setTimeout(typeNext, 45 + Math.random() * 35);
            } else {
                // Commande terminée — saut de ligne
                charIndex = 0;
                seqIndex++;
                setTimeout(step, 350);
            }
        }
    }

    function step() {
        typeNext();
    }

    // Démarrage décalé pour laisser la page charger
    appendCursor();
    setTimeout(step, 800);
})();
</script>
@endpush

@endsection
