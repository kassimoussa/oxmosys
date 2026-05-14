@extends('layouts.app')

@section('title', 'Demander un devis')
@section('meta_description', 'Demandez un devis personnalisé à OXMOSYS-TECH. Décrivez votre projet IT en 4 étapes simples et recevez une proposition sur-mesure.')

@section('content')

<div class="pb-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto w-full">

    {{-- ===== HERO ===== --}}
    <div class="pt-12 mb-12 border-l-4 border-secondary pl-6">
        <span class="hero-el hero-fade-down hero-d0 font-label-sm text-label-sm text-tertiary
                     uppercase tracking-widest mb-3 inline-block">
            Demande de devis
        </span>
        <h1 class="hero-el hero-fade-up hero-d1 font-headline-xl text-headline-xl-mobile md:text-headline-xl
                   font-extrabold text-on-surface tracking-tight">
            Construisons votre projet ensemble.
        </h1>
        <p class="hero-el hero-fade-up hero-d2 font-body-lg text-body-lg text-on-surface-variant mt-4 max-w-2xl">
            Répondez aux 4 étapes ci-dessous pour nous aider à préparer
            une proposition technique et commerciale adaptée à votre réalité.
        </p>
    </div>

    {{-- ===== THROTTLE ERROR ===== --}}
    @if(session('error'))
        <div class="mb-8 flex items-start gap-4 bg-surface-container border border-error p-6">
            <span class="material-symbols-outlined text-error shrink-0"
                  style="font-variation-settings:'FILL' 1;">warning</span>
            <p class="font-body-md text-body-md text-on-surface">{{ session('error') }}</p>
        </div>
    @endif

    {{-- ===== SUCCESS ===== --}}
    @if(session('success'))
        <div class="mb-10 flex items-start gap-4 bg-surface-container border border-tertiary p-6">
            <span class="material-symbols-outlined text-tertiary shrink-0"
                  style="font-variation-settings:'FILL' 1;">check_circle</span>
            <div>
                <p class="font-body-lg text-body-lg font-bold text-on-surface mb-1">
                    Demande reçue avec succès !
                </p>
                <p class="font-body-md text-body-md text-on-surface-variant">
                    {{ session('success') }}
                </p>
            </div>
        </div>
    @endif

    {{-- ===== STEPPER + FORM ===== --}}
    <div class="hero-el hero-fade-up hero-d3">

        {{-- ---- Step indicators ---- --}}
        <div class="mb-10">
            <div class="flex items-center gap-0 mb-4" id="step-indicators">
                @php
                    $steps = [
                        ['num' => 1, 'label' => 'Votre entreprise'],
                        ['num' => 2, 'label' => 'Services souhaités'],
                        ['num' => 3, 'label' => 'Cadrage projet'],
                        ['num' => 4, 'label' => 'Coordonnées'],
                    ];
                @endphp
                @foreach($steps as $i => $step)
                    <div class="flex flex-col items-center {{ $i < count($steps) - 1 ? 'flex-1' : '' }}">
                        <div class="step-bubble {{ $i === 0 ? 'active' : '' }}" data-bubble="{{ $i }}">
                            <span class="step-num">{{ $step['num'] }}</span>
                            <span class="step-check hidden">✓</span>
                        </div>
                        <span class="mt-2 font-label-sm text-label-sm text-on-surface-variant
                                     text-center hidden sm:block leading-tight max-w-[80px]">
                            {{ $step['label'] }}
                        </span>
                    </div>
                    @if($i < count($steps) - 1)
                        <div class="flex-1 h-px bg-primary-container mx-2 mt-[-20px] sm:mt-[-28px] step-line"
                             data-line="{{ $i }}"></div>
                    @endif
                @endforeach
            </div>

            {{-- Progress bar --}}
            <div class="h-0.5 bg-primary-container/30 rounded-full overflow-hidden">
                <div id="progress-bar"
                     class="h-full bg-secondary-container transition-all duration-500 ease-out"
                     style="width: 0%"></div>
            </div>
        </div>

        {{-- ---- Form ---- --}}
        <form id="devis-form" action="{{ route('devis.send') }}" method="POST" novalidate>
            @csrf
            <x-honeypot />

            {{-- ======================================================
                 STEP 1 — Votre entreprise
                 ====================================================== --}}
            <div class="form-step bg-surface-container border border-primary-container p-6 md:p-10 relative"
                 data-step="0">
                <div class="absolute top-0 right-0 w-3 h-3 bg-secondary-container"></div>

                <h2 class="font-headline-md text-headline-md font-bold text-on-surface mb-8
                           flex items-center gap-3">
                    <span class="step-bubble active shrink-0">1</span>
                    Votre entreprise
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Nom (seul champ obligatoire) --}}
                    <div class="flex flex-col gap-2 md:col-span-2">
                        <label for="contact_name" class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">
                            Nom & prénom <span class="text-secondary-container">*</span>
                        </label>
                        <input type="text" id="contact_name" name="contact_name"
                               value="{{ old('contact_name') }}"
                               placeholder="Ex : Mohamed Ali"
                               class="field-input {{ $errors->has('contact_name') ? 'field-error' : '' }}">
                        @error('contact_name')
                            <p class="field-msg-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Société --}}
                    <div class="flex flex-col gap-2">
                        <label for="company_name" class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">
                            Nom de l'entreprise
                            <span class="normal-case text-outline ml-1">(optionnel)</span>
                        </label>
                        <input type="text" id="company_name" name="company"
                               value="{{ old('company') }}"
                               placeholder="Ex : Société ALIMED"
                               class="field-input">
                    </div>

                    {{-- Secteur --}}
                    <div class="flex flex-col gap-2">
                        <label for="sector" class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">
                            Secteur d'activité
                            <span class="normal-case text-outline ml-1">(optionnel)</span>
                        </label>
                        <div class="relative">
                            <select id="sector" name="sector" class="field-select">
                                <option value="">Sélectionnez…</option>
                                @foreach($devis_sectors as $s)
                                    <option value="{{ $s['value'] }}" {{ old('sector') === $s['value'] ? 'selected' : '' }}>
                                        {{ $s['label'] }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="field-chevron"><span class="material-symbols-outlined" style="font-size:18px;">expand_more</span></div>
                        </div>
                    </div>

                    {{-- Effectif --}}
                    <div class="flex flex-col gap-2 md:col-span-2">
                        <label for="employees" class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">
                            Effectif
                            <span class="normal-case text-outline ml-1">(optionnel)</span>
                        </label>
                        <div class="relative">
                            <select id="employees" name="employees" class="field-select">
                                <option value="">Sélectionnez…</option>
                                @foreach($devis_employees as $e)
                                    <option value="{{ $e['value'] }}" {{ old('employees') === $e['value'] ? 'selected' : '' }}>
                                        {{ $e['label'] }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="field-chevron"><span class="material-symbols-outlined" style="font-size:18px;">expand_more</span></div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="button" class="btn-next btn-primary-action" data-step="0">
                        Étape suivante
                        <span class="material-symbols-outlined text-base" style="font-variation-settings:'FILL' 1;">arrow_forward</span>
                    </button>
                </div>
            </div>

            {{-- ======================================================
                 STEP 2 — Services souhaités
                 ====================================================== --}}
            <div class="form-step hidden bg-surface-container border border-primary-container p-6 md:p-10 relative"
                 data-step="1">
                <div class="absolute top-0 right-0 w-3 h-3 bg-secondary-container"></div>

                <h2 class="font-headline-md text-headline-md font-bold text-on-surface mb-2
                           flex items-center gap-3">
                    <span class="step-bubble shrink-0">2</span>
                    Services souhaités
                </h2>
                <p class="font-body-md text-body-md text-on-surface-variant mb-8 ml-14">
                    Sélectionnez un ou plusieurs domaines — vous pouvez en choisir autant que nécessaire.
                </p>

                @error('services')
                    <p class="field-msg-error mb-4">{{ $message }}</p>
                @enderror

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4" id="services-grid">
                    @foreach($services as $service)
                        @php $checked = in_array($service['key'], old('services', [])); @endphp
                        <label class="service-check-card {{ $checked ? 'selected' : '' }} p-4 flex items-start gap-3 cursor-pointer select-none"
                               data-service="{{ $service['key'] }}">
                            <input type="checkbox"
                                   name="services[]"
                                   value="{{ $service['key'] }}"
                                   class="sr-only"
                                   {{ $checked ? 'checked' : '' }}>
                            <div class="check-dot shrink-0 mt-0.5">
                                @if($checked)
                                    <span class="material-symbols-outlined text-white" style="font-size:12px;">check</span>
                                @endif
                            </div>
                            <div>
                                <span class="material-symbols-outlined text-secondary-container block mb-1"
                                      style="font-size:24px;">{{ $service['icon'] }}</span>
                                <p class="font-body-md text-body-md font-bold text-on-surface leading-tight">
                                    {{ $service['title'] }}
                                </p>
                                <p class="font-label-sm text-label-sm text-on-surface-variant mt-1 leading-snug">
                                    {{ $service['description'] }}
                                </p>
                            </div>
                        </label>
                    @endforeach
                </div>

                <div class="mt-8 flex justify-between">
                    <button type="button" class="btn-prev btn-ghost-action" data-step="1">
                        <span class="material-symbols-outlined text-base">arrow_back</span>
                        Précédent
                    </button>
                    <button type="button" class="btn-next btn-primary-action" data-step="1">
                        Étape suivante
                        <span class="material-symbols-outlined text-base" style="font-variation-settings:'FILL' 1;">arrow_forward</span>
                    </button>
                </div>
            </div>

            {{-- ======================================================
                 STEP 3 — Cadrage projet
                 ====================================================== --}}
            <div class="form-step hidden bg-surface-container border border-primary-container p-6 md:p-10 relative"
                 data-step="2">
                <div class="absolute top-0 right-0 w-3 h-3 bg-secondary-container"></div>

                <h2 class="font-headline-md text-headline-md font-bold text-on-surface mb-8
                           flex items-center gap-3">
                    <span class="step-bubble shrink-0">3</span>
                    Cadrage du projet
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Budget --}}
                    <div class="flex flex-col gap-2">
                        <label for="budget" class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">
                            Budget estimé <span class="text-secondary-container">*</span>
                        </label>
                        <div class="relative">
                            <select id="budget" name="budget"
                                    class="field-select {{ $errors->has('budget') ? 'field-error' : '' }}">
                                <option value="" disabled {{ old('budget') ? '' : 'selected' }}>Sélectionnez…</option>
                                @foreach($devis_budgets as $b)
                                    <option value="{{ $b['value'] }}" {{ old('budget') === $b['value'] ? 'selected' : '' }}>
                                        {{ $b['label'] }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="field-chevron"><span class="material-symbols-outlined" style="font-size:18px;">expand_more</span></div>
                        </div>
                        @error('budget') <p class="field-msg-error">{{ $message }}</p> @enderror
                    </div>

                    {{-- Délai --}}
                    <div class="flex flex-col gap-2">
                        <label for="timeline" class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">
                            Délai souhaité <span class="text-secondary-container">*</span>
                        </label>
                        <div class="relative">
                            <select id="timeline" name="timeline"
                                    class="field-select {{ $errors->has('timeline') ? 'field-error' : '' }}">
                                <option value="" disabled {{ old('timeline') ? '' : 'selected' }}>Sélectionnez…</option>
                                @foreach($devis_timelines as $t)
                                    <option value="{{ $t['value'] }}" {{ old('timeline') === $t['value'] ? 'selected' : '' }}>
                                        {{ $t['label'] }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="field-chevron"><span class="material-symbols-outlined" style="font-size:18px;">expand_more</span></div>
                        </div>
                        @error('timeline') <p class="field-msg-error">{{ $message }}</p> @enderror
                    </div>

                    {{-- Description projet --}}
                    <div class="flex flex-col gap-2 md:col-span-2">
                        <label for="project_description" class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">
                            Description du projet / besoin <span class="text-secondary-container">*</span>
                        </label>
                        <textarea id="project_description" name="project_description"
                                  rows="5" placeholder="Décrivez votre projet, vos objectifs, vos problématiques actuelles…"
                                  class="field-input resize-y min-h-32 {{ $errors->has('project_description') ? 'field-error' : '' }}">{{ old('project_description') }}</textarea>
                        @error('project_description') <p class="field-msg-error">{{ $message }}</p> @enderror
                    </div>

                    {{-- Infrastructure actuelle --}}
                    <div class="flex flex-col gap-2 md:col-span-2">
                        <label for="current_infra" class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">
                            Infrastructure informatique actuelle
                            <span class="normal-case text-outline ml-1">(optionnel)</span>
                        </label>
                        <textarea id="current_infra" name="current_infra"
                                  rows="3" placeholder="Ex : serveurs on-premise, postes Windows 10, réseau Wi-Fi non sécurisé, pas d'antivirus centralisé…"
                                  class="field-input resize-y">{{ old('current_infra') }}</textarea>
                    </div>
                </div>

                <div class="mt-8 flex justify-between">
                    <button type="button" class="btn-prev btn-ghost-action" data-step="2">
                        <span class="material-symbols-outlined text-base">arrow_back</span>
                        Précédent
                    </button>
                    <button type="button" class="btn-next btn-primary-action" data-step="2">
                        Étape suivante
                        <span class="material-symbols-outlined text-base" style="font-variation-settings:'FILL' 1;">arrow_forward</span>
                    </button>
                </div>
            </div>

            {{-- ======================================================
                 STEP 4 — Coordonnées & confirmation
                 ====================================================== --}}
            <div class="form-step hidden bg-surface-container border border-primary-container p-6 md:p-10 relative"
                 data-step="3">
                <div class="absolute top-0 right-0 w-3 h-3 bg-secondary-container"></div>

                <h2 class="font-headline-md text-headline-md font-bold text-on-surface mb-8
                           flex items-center gap-3">
                    <span class="step-bubble shrink-0">4</span>
                    Vos coordonnées
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- E-mail --}}
                    <div class="flex flex-col gap-2">
                        <label for="email" class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">
                            Adresse e-mail <span class="text-secondary-container">*</span>
                        </label>
                        <input type="email" id="email" name="email"
                               value="{{ old('email') }}"
                               placeholder="contact@entreprise.com"
                               autocomplete="email"
                               class="field-input {{ $errors->has('email') ? 'field-error' : '' }}">
                        @error('email') <p class="field-msg-error">{{ $message }}</p> @enderror
                    </div>

                    {{-- Téléphone --}}
                    <div class="flex flex-col gap-2">
                        <label for="phone" class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">
                            Téléphone <span class="text-secondary-container">*</span>
                        </label>
                        <input type="tel" id="phone" name="phone"
                               value="{{ old('phone') }}"
                               placeholder="+253 00 00 00 00"
                               autocomplete="tel"
                               class="field-input {{ $errors->has('phone') ? 'field-error' : '' }}">
                        @error('phone') <p class="field-msg-error">{{ $message }}</p> @enderror
                    </div>

                    {{-- Récapitulatif sélections --}}
                    <div class="md:col-span-2 bg-surface-container-low border border-primary-container/50 p-4">
                        <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider mb-3">
                            Récapitulatif de votre demande
                        </p>
                        <div id="recap" class="font-body-md text-body-md text-on-surface-variant space-y-1">
                            <p><span class="text-on-surface font-bold">Entreprise :</span> <span id="recap-company">—</span></p>
                            <p><span class="text-on-surface font-bold">Services :</span> <span id="recap-services">—</span></p>
                            <p><span class="text-on-surface font-bold">Budget :</span> <span id="recap-budget">—</span></p>
                            <p><span class="text-on-surface font-bold">Délai :</span> <span id="recap-timeline">—</span></p>
                        </div>
                    </div>

                    {{-- Conditions --}}
                    <div class="md:col-span-2">
                        <label class="flex items-start gap-3 cursor-pointer group">
                            <input type="checkbox" name="accept_terms" value="1"
                                   {{ old('accept_terms') ? 'checked' : '' }}
                                   class="mt-1 w-4 h-4 shrink-0 accent-orange-500">
                            <span class="font-body-md text-body-md text-on-surface-variant
                                         group-hover:text-on-surface transition-colors">
                                J'accepte que mes données soient utilisées par OXMOSYS-TECH pour traiter
                                ma demande de devis. Aucune information ne sera transmise à des tiers.
                                <span class="text-secondary-container">*</span>
                            </span>
                        </label>
                        @error('accept_terms') <p class="field-msg-error mt-2">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="mt-8 flex flex-col sm:flex-row justify-between gap-4">
                    <button type="button" class="btn-prev btn-ghost-action" data-step="3">
                        <span class="material-symbols-outlined text-base">arrow_back</span>
                        Précédent
                    </button>
                    <button type="submit"
                            class="btn-ripple inline-flex items-center justify-center gap-3
                                   bg-secondary text-on-secondary border border-secondary
                                   hover:bg-transparent hover:text-secondary transition-all duration-300
                                   font-label-sm text-label-sm uppercase tracking-widest px-8 py-4">
                        <span class="material-symbols-outlined" style="font-size:20px;">send</span>
                        Envoyer ma demande de devis
                    </button>
                </div>
            </div>

        </form>
    </div>

    {{-- ===== INFO LATÉRALE (pourquoi nous choisir) ===== --}}
    <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-gutter">
        @php
            $advantages = [
                ['icon' => 'timer',        'title' => 'Réponse sous 24 h',      'desc' => 'Un expert vous rappelle dans la journée ouvrable suivant votre demande.'],
                ['icon' => 'handshake',    'title' => 'Devis 100 % gratuit',     'desc' => 'Aucun engagement. Notre proposition est entièrement gratuite et sans obligation.'],
                ['icon' => 'shield_person','title' => 'Confidentialité garantie','desc' => 'Vos informations restent strictement confidentielles et ne sont jamais revendues.'],
            ];
        @endphp
        @foreach($advantages as $i => $adv)
            <div data-animate="fade-up" data-delay="{{ $i * 150 }}"
                 class="tech-card bg-surface-container-low p-6 flex flex-col gap-3">
                <span class="material-symbols-outlined text-secondary-container"
                      style="font-size:36px; font-variation-settings:'FILL' 1;">{{ $adv['icon'] }}</span>
                <h3 class="font-headline-md text-headline-md font-bold text-on-surface">{{ $adv['title'] }}</h3>
                <p class="font-body-md text-body-md text-on-surface-variant">{{ $adv['desc'] }}</p>
            </div>
        @endforeach
    </div>
</div>

@push('styles')
<style>
/* Field utilities — scoped to this page */
.field-input {
    background: var(--color-surface);
    border: 1px solid var(--color-primary-container);
    color: var(--color-on-surface);
    font-size: 1rem;
    line-height: 1.6;
    padding: 0.75rem 1rem;
    border-radius: 0;
    width: 100%;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
    outline: none;
}
.field-input::placeholder { color: var(--color-outline); }
.field-input:focus {
    border-color: var(--color-secondary);
    box-shadow: 0 0 0 1px var(--color-secondary);
}
.field-input.field-error  { border-color: var(--color-error); }
.field-select {
    background: var(--color-surface);
    border: 1px solid var(--color-primary-container);
    color: var(--color-on-surface);
    font-size: 1rem;
    line-height: 1.6;
    padding: 0.75rem 3rem 0.75rem 1rem;
    border-radius: 0;
    width: 100%;
    appearance: none;
    cursor: pointer;
    transition: border-color 0.2s ease;
    outline: none;
}
.field-select:focus { border-color: var(--color-secondary); }
.field-select.field-error { border-color: var(--color-error); }
.field-chevron {
    pointer-events: none;
    position: absolute;
    inset-block: 0;
    right: 0;
    display: flex;
    align-items: center;
    padding-inline: 1rem;
    color: var(--color-on-surface-variant);
}
.field-msg-error {
    display: flex;
    align-items: center;
    gap: 0.25rem;
    font-size: 0.75rem;
    line-height: 1;
    color: var(--color-error);
}
.btn-primary-action {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: var(--color-secondary-container);
    color: #ffffff;
    font-family: 'JetBrains Mono', monospace;
    font-size: 0.75rem;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    padding: 0.875rem 2rem;
    border: 1px solid var(--color-secondary-container);
    transition: background 0.25s ease, color 0.25s ease;
    cursor: pointer;
}
.btn-primary-action:hover {
    background: transparent;
    color: var(--color-secondary-container);
}
.btn-ghost-action {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: transparent;
    color: var(--color-on-surface-variant);
    font-family: 'JetBrains Mono', monospace;
    font-size: 0.75rem;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    padding: 0.875rem 1.5rem;
    border: 1px solid var(--color-primary-container);
    transition: border-color 0.25s ease, color 0.25s ease;
    cursor: pointer;
}
.btn-ghost-action:hover {
    border-color: var(--color-on-surface-variant);
    color: var(--color-on-surface);
}
</style>
@endpush

@push('scripts')
<script>
(function () {
    const TOTAL_STEPS = 4;
    let currentStep  = 0;

    const form       = document.getElementById('devis-form');
    const steps      = form.querySelectorAll('.form-step');
    const bubbles    = document.querySelectorAll('[data-bubble]');
    const lines      = document.querySelectorAll('[data-line]');
    const progressEl = document.getElementById('progress-bar');

    // ---- Recap elements ----
    const recapCompany  = document.getElementById('recap-company');
    const recapServices = document.getElementById('recap-services');
    const recapBudget   = document.getElementById('recap-budget');
    const recapTimeline = document.getElementById('recap-timeline');

    // ---- UI update ----
    function updateStepper(step) {
        bubbles.forEach((b, i) => {
            b.classList.remove('active', 'done');
            b.querySelector('.step-num').classList.remove('hidden');
            b.querySelector('.step-check').classList.add('hidden');
            if (i < step) {
                b.classList.add('done');
                b.querySelector('.step-num').classList.add('hidden');
                b.querySelector('.step-check').classList.remove('hidden');
            } else if (i === step) {
                b.classList.add('active');
            }
        });

        lines.forEach((l, i) => {
            l.style.background = i < step
                ? 'var(--color-secondary-container)'
                : 'var(--color-primary-container)';
        });

        const pct = (step / (TOTAL_STEPS - 1)) * 100;
        progressEl.style.width = pct + '%';
    }

    // ---- Navigate to step ----
    function goTo(target, direction) {
        const current = steps[currentStep];
        const next    = steps[target];

        const exitClass   = direction === 'forward' ? 'step-slide-out-left' : 'step-slide-out-right';
        const enterClass  = direction === 'forward' ? 'step-slide-in-right' : 'step-slide-in-left';

        current.classList.add(exitClass);
        setTimeout(() => {
            current.classList.add('hidden');
            current.classList.remove(exitClass);

            next.classList.remove('hidden');
            next.classList.add(enterClass);
            setTimeout(() => next.classList.remove(enterClass), 400);

            currentStep = target;
            updateStepper(currentStep);
            if (currentStep === 3) updateRecap();
            window.scrollTo({ top: form.getBoundingClientRect().top + window.scrollY - 120, behavior: 'smooth' });
        }, 260);
    }

    // ---- Validation ----
    function validateStep(stepIndex) {
        const step = steps[stepIndex];
        let valid  = true;

        // Clear previous errors
        step.querySelectorAll('.step-error-msg').forEach(e => e.remove());
        step.querySelectorAll('.field-input, .field-select').forEach(f => f.classList.remove('field-error'));

        if (stepIndex === 0) {
            const el = step.querySelector('[name="contact_name"]');
            if (!el || !el.value.trim()) {
                valid = false;
                if (el) el.classList.add('field-error');
            }
        }

        if (stepIndex === 1) {
            const checked = step.querySelectorAll('input[type="checkbox"]:checked');
            if (checked.length === 0) {
                valid = false;
                const grid = document.getElementById('services-grid');
                const msg  = document.createElement('p');
                msg.className = 'field-msg-error step-error-msg mb-2';
                msg.textContent = 'Veuillez sélectionner au moins un service.';
                grid.before(msg);
            }
        }

        if (stepIndex === 2) {
            ['budget', 'timeline', 'project_description'].forEach(name => {
                const el = step.querySelector(`[name="${name}"]`);
                if (!el || !el.value.trim()) {
                    valid = false;
                    if (el) el.classList.add('field-error');
                }
            });
        }

        if (stepIndex === 3) {
            ['email', 'phone'].forEach(name => {
                const el = step.querySelector(`[name="${name}"]`);
                if (!el || !el.value.trim()) {
                    valid = false;
                    if (el) el.classList.add('field-error');
                }
            });
            const radio = step.querySelector('input[name="preferred_contact"]:checked');
            if (!radio) valid = false;
            const terms = step.querySelector('[name="accept_terms"]');
            if (!terms || !terms.checked) valid = false;
        }

        return valid;
    }

    // ---- Recap ----
    function updateRecap() {
        const company = form.querySelector('[name="company"]');
        if (recapCompany && company) recapCompany.textContent = company.value || '—';

        const checked = Array.from(form.querySelectorAll('input[name="services[]"]:checked'))
            .map(cb => cb.closest('[data-service]')?.querySelector('.font-bold')?.textContent?.trim())
            .filter(Boolean);
        if (recapServices) recapServices.textContent = checked.length ? checked.join(', ') : '—';

        const budget = form.querySelector('[name="budget"]');
        if (recapBudget && budget) {
            recapBudget.textContent = budget.options[budget.selectedIndex]?.text || '—';
        }
        const timeline = form.querySelector('[name="timeline"]');
        if (recapTimeline && timeline) {
            recapTimeline.textContent = timeline.options[timeline.selectedIndex]?.text || '—';
        }
    }

    // ---- Next buttons ----
    form.querySelectorAll('.btn-next').forEach(btn => {
        btn.addEventListener('click', () => {
            const step = parseInt(btn.dataset.step);
            if (validateStep(step) && step < TOTAL_STEPS - 1) {
                goTo(step + 1, 'forward');
            }
        });
    });

    // ---- Prev buttons ----
    form.querySelectorAll('.btn-prev').forEach(btn => {
        btn.addEventListener('click', () => {
            const step = parseInt(btn.dataset.step);
            if (step > 0) goTo(step - 1, 'backward');
        });
    });

    // ---- Service card toggles ----
    document.querySelectorAll('.service-check-card').forEach(card => {
        card.addEventListener('click', () => {
            const cb   = card.querySelector('input[type="checkbox"]');
            cb.checked = !cb.checked;
            card.classList.toggle('selected', cb.checked);
            const dot  = card.querySelector('.check-dot');
            if (cb.checked) {
                dot.innerHTML = '<span class="material-symbols-outlined text-white" style="font-size:12px;">check</span>';
            } else {
                dot.innerHTML = '';
            }
        });
    });

    // ---- Init ----
    updateStepper(0);

    // If server returned errors, jump to the earliest step with an error
    @if($errors->any())
        @if($errors->hasAny(['contact_name', 'company', 'sector', 'employees', 'location']))
            // stay on step 0
        @elseif($errors->has('services'))
            goTo(1, 'forward');
        @elseif($errors->hasAny(['budget', 'timeline', 'project_description']))
            goTo(1, 'forward');
            setTimeout(() => goTo(2, 'forward'), 400);
        @else
            goTo(1, 'forward');
            setTimeout(() => goTo(2, 'forward'), 400);
            setTimeout(() => goTo(3, 'forward'), 800);
        @endif
    @endif
})();
</script>
@endpush

@endsection
