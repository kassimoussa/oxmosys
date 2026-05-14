@extends('layouts.app')

@section('title', 'Mentions légales')
@section('meta_description', 'Mentions légales du site OXMOSYS-TECH — informations sur l\'éditeur, l\'hébergeur et les conditions d\'utilisation.')

@section('content')

{{-- ===== HERO ===== --}}
<header class="bg-surface-container-low border-b border-primary-container py-14">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
        <span class="hero-el hero-fade-down hero-d0 font-label-sm text-label-sm text-tertiary
                     uppercase tracking-widest mb-3 inline-block">Légal</span>
        <h1 class="hero-el hero-fade-up hero-d1 font-headline-xl text-headline-xl-mobile md:text-headline-xl
                   font-extrabold text-on-surface tracking-tight">
            Mentions légales
        </h1>
        <p class="hero-el hero-fade-up hero-d2 font-body-md text-body-md text-on-surface-variant mt-3">
            Dernière mise à jour : {{ now()->format('d/m/Y') }}
        </p>
    </div>
</header>

{{-- ===== CONTENU ===== --}}
<div class="max-w-3xl mx-auto px-margin-mobile md:px-8 py-16">

    @php
        $section = 'font-headline-md text-headline-md font-bold text-on-surface mb-4 border-l-4 border-secondary pl-4';
        $body    = 'font-body-md text-body-md text-on-surface-variant leading-relaxed space-y-3';
        $label   = 'font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider';
        $value   = 'font-body-md text-body-md text-on-surface';
        $todo    = 'inline-flex items-center gap-1 bg-secondary-container/10 border border-secondary-container
                    text-secondary-container font-label-sm text-label-sm px-2 py-0.5 rounded-sm';
    @endphp

    {{--
    ===== 1. ÉDITEUR DU SITE (masqué temporairement) =====
    <section data-animate="fade-up" class="mb-12 pb-10 border-b border-primary-container/30">
        <h2 class="{{ $section }}">1. Éditeur du site</h2>
        <div class="{{ $body }}">
            <table class="w-full border-collapse">
                <tbody>
                    <tr class="border-b border-primary-container/30">
                        <td class="py-3 pr-6 {{ $label }} w-48">Raison sociale</td>
                        <td class="py-3 {{ $value }}">{{ $company['name'] }}</td>
                    </tr>
                    <tr class="border-b border-primary-container/30">
                        <td class="py-3 pr-6 {{ $label }}">Forme juridique</td>
                        <td class="py-3 {{ $value }}">
                            <span class="{{ $todo }}">À compléter — ex : SARL, SA, EI…</span>
                        </td>
                    </tr>
                    <tr class="border-b border-primary-container/30">
                        <td class="py-3 pr-6 {{ $label }}">Capital social</td>
                        <td class="py-3 {{ $value }}">
                            <span class="{{ $todo }}">À compléter — ex : 5 000 000 FDJ</span>
                        </td>
                    </tr>
                    <tr class="border-b border-primary-container/30">
                        <td class="py-3 pr-6 {{ $label }}">N° RCCM</td>
                        <td class="py-3 {{ $value }}">
                            <span class="{{ $todo }}">À compléter — Registre du Commerce de Djibouti</span>
                        </td>
                    </tr>
                    <tr class="border-b border-primary-container/30">
                        <td class="py-3 pr-6 {{ $label }}">N° Fiscal (NIF)</td>
                        <td class="py-3 {{ $value }}">
                            <span class="{{ $todo }}">À compléter</span>
                        </td>
                    </tr>
                    <tr class="border-b border-primary-container/30">
                        <td class="py-3 pr-6 {{ $label }}">Siège social</td>
                        <td class="py-3 {{ $value }}">
                            {{ $company['address_line1'] }}<br>
                            {{ $company['address_line2'] }}
                        </td>
                    </tr>
                    <tr class="border-b border-primary-container/30">
                        <td class="py-3 pr-6 {{ $label }}">Téléphone</td>
                        <td class="py-3 {{ $value }}">
                            <a href="tel:{{ preg_replace('/\s+/', '', $company['phone']) }}"
                               class="hover:text-secondary transition-colors">
                                {{ $company['phone'] }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-3 pr-6 {{ $label }}">E-mail</td>
                        <td class="py-3 {{ $value }}">
                            <a href="mailto:{{ $company['email'] }}"
                               class="hover:text-secondary transition-colors">
                                {{ $company['email'] }}
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    --}}

    {{--
    ===== 2. DIRECTEUR DE LA PUBLICATION (masqué temporairement) =====
    <section data-animate="fade-up" class="mb-12 pb-10 border-b border-primary-container/30">
        <h2 class="{{ $section }}">2. Directeur de la publication</h2>
        <div class="{{ $body }}">
            <p>
                <span class="{{ $todo }}">À compléter — Nom et prénom du responsable légal ou du gérant</span>
            </p>
        </div>
    </section>
    --}}

    {{--
    ===== 3. HÉBERGEMENT (masqué temporairement) =====
    <section data-animate="fade-up" class="mb-12 pb-10 border-b border-primary-container/30">
        <h2 class="{{ $section }}">3. Hébergement</h2>
        <div class="{{ $body }}">
            <table class="w-full border-collapse">
                <tbody>
                    <tr class="border-b border-primary-container/30">
                        <td class="py-3 pr-6 {{ $label }} w-48">Hébergeur</td>
                        <td class="py-3 {{ $value }}">LWS (Ligne Web Services)</td>
                    </tr>
                    <tr class="border-b border-primary-container/30">
                        <td class="py-3 pr-6 {{ $label }}">Adresse</td>
                        <td class="py-3 {{ $value }}">
                            2 rue Jules Ferry, 88190 Golbey, France
                        </td>
                    </tr>
                    <tr>
                        <td class="py-3 pr-6 {{ $label }}">Site web</td>
                        <td class="py-3 {{ $value }}">
                            <a href="https://www.lws.fr" target="_blank" rel="noopener noreferrer"
                               class="hover:text-secondary transition-colors">
                                www.lws.fr
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    --}}

    {{-- 1. Propriété intellectuelle --}}
    <section data-animate="fade-up" class="mb-12 pb-10 border-b border-primary-container/30">
        <h2 class="{{ $section }}">1. Propriété intellectuelle</h2>
        <div class="{{ $body }}">
            <p>
                L'ensemble des éléments constituant ce site (textes, visuels, logo, architecture,
                code source) est la propriété exclusive de <strong class="text-on-surface">{{ $company['name'] }}</strong>
                et est protégé par les droits applicables en matière de propriété intellectuelle.
            </p>
            <p>
                Toute reproduction, représentation, modification ou diffusion, totale ou partielle,
                sans autorisation écrite préalable est strictement interdite.
            </p>
        </div>
    </section>

    {{-- 2. Limitation de responsabilité --}}
    <section data-animate="fade-up" class="mb-12 pb-10 border-b border-primary-container/30">
        <h2 class="{{ $section }}">2. Limitation de responsabilité</h2>
        <div class="{{ $body }}">
            <p>
                {{ $company['name'] }} s'efforce de maintenir les informations publiées sur ce site
                aussi exactes que possible. Toutefois, nous ne garantissons pas l'exactitude,
                l'exhaustivité ou l'actualité des informations diffusées.
            </p>
            <p>
                {{ $company['name'] }} ne saurait être tenu responsable des dommages directs ou
                indirects résultant de l'utilisation de ce site ou de l'impossibilité d'y accéder.
            </p>
            <p>
                Les liens hypertextes présents sur ce site vers des sites tiers sont fournis à titre
                indicatif. {{ $company['name'] }} n'exerce aucun contrôle sur ces sites et décline
                toute responsabilité quant à leur contenu.
            </p>
        </div>
    </section>

    {{-- 3. Droit applicable --}}
    <section data-animate="fade-up" class="mb-12 pb-10 border-b border-primary-container/30">
        <h2 class="{{ $section }}">3. Droit applicable</h2>
        <div class="{{ $body }}">
            <p>
                Le présent site et ses mentions légales sont soumis au droit de la
                République de Djibouti. En cas de litige, les tribunaux compétents
                de Djibouti seront seuls habilités à connaître du différend.
            </p>
        </div>
    </section>

    {{-- Lien politique confidentialité --}}
    <div class="mt-12 bg-surface-container border border-primary-container p-6 flex items-start gap-4"
         data-animate="fade-up">
        <span class="material-symbols-outlined text-secondary-container shrink-0"
              style="font-variation-settings:'FILL' 1;">privacy_tip</span>
        <div>
            <p class="font-body-md text-body-md text-on-surface mb-2">
                Pour toute information sur la collecte et le traitement de vos données personnelles,
                consultez notre
                <a href="{{ route('confidentialite') }}"
                   class="text-secondary underline underline-offset-4 hover:text-secondary-container transition-colors">
                    Politique de confidentialité
                </a>.
            </p>
        </div>
    </div>

</div>

@endsection
