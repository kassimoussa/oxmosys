@extends('layouts.app')

@section('title', 'Politique de confidentialité')
@section('meta_description', 'Politique de confidentialité d\'OXMOSYS-TECH — comment nous collectons, utilisons et protégeons vos données personnelles.')

@section('content')

{{-- ===== HERO ===== --}}
<header class="bg-surface-container-low border-b border-primary-container py-14">
    <div class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop">
        <span class="hero-el hero-fade-down hero-d0 font-label-sm text-label-sm text-tertiary
                     uppercase tracking-widest mb-3 inline-block">Légal</span>
        <h1 class="hero-el hero-fade-up hero-d1 font-headline-xl text-headline-xl-mobile md:text-headline-xl
                   font-extrabold text-on-surface tracking-tight">
            Politique de confidentialité
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
        $strong  = 'font-semibold text-on-surface';
        $chip    = 'inline-flex items-center gap-1 bg-primary-container/20 border border-primary-container
                    text-on-surface font-label-sm text-label-sm px-2 py-0.5 rounded-sm';
    @endphp

    {{-- Intro --}}
    <div data-animate="fade-up" class="mb-12"
         class="bg-surface-container border-l-4 border-secondary p-6">
        <p class="font-body-md text-body-md text-on-surface leading-relaxed">
            {{ $company['name'] }} attache une grande importance au respect de votre vie privée.
            Cette politique explique, de façon simple et transparente, quelles données nous collectons,
            pourquoi, et comment vous pouvez les contrôler.
        </p>
    </div>

    {{-- 1. Responsable --}}
    <section data-animate="fade-up" class="mb-12 pb-10 border-b border-primary-container/30">
        <h2 class="{{ $section }}">1. Responsable du traitement</h2>
        <div class="{{ $body }}">
            <p>
                Le responsable du traitement des données collectées via ce site est :
            </p>
            <p class="bg-surface-container border border-primary-container p-4">
                <span class="{{ $strong }}">{{ $company['name'] }}</span><br>
                {{ $company['address_line1'] }}, {{ $company['address_line2'] }}<br>
                E-mail :
                <a href="mailto:{{ $company['email'] }}"
                   class="text-secondary hover:underline">{{ $company['email'] }}</a><br>
                Tél. : {{ $company['phone'] }}
            </p>
        </div>
    </section>

    {{-- 2. Données collectées --}}
    <section data-animate="fade-up" class="mb-12 pb-10 border-b border-primary-container/30">
        <h2 class="{{ $section }}">2. Données que nous collectons</h2>
        <div class="{{ $body }}">
            <p>
                Nous collectons uniquement les données que vous nous transmettez
                <span class="{{ $strong }}">volontairement</span> via nos formulaires.
                Nous ne recueillons aucune donnée à votre insu.
            </p>

            <div class="space-y-4 mt-4">
                <div class="bg-surface-container border border-primary-container p-4">
                    <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider mb-3">
                        Formulaire de contact
                    </p>
                    <ul class="space-y-1">
                        <li class="flex items-center gap-2">
                            <span class="{{ $chip }}">Nom & prénom</span>
                            <span class="text-on-surface-variant">pour vous identifier</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="{{ $chip }}">E-mail</span>
                            <span class="text-on-surface-variant">pour vous répondre</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="{{ $chip }}">Téléphone</span>
                            <span class="text-on-surface-variant">optionnel — pour vous rappeler</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="{{ $chip }}">Société</span>
                            <span class="text-on-surface-variant">optionnel — contexte professionnel</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="{{ $chip }}">Message</span>
                            <span class="text-on-surface-variant">contenu de votre demande</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-surface-container border border-primary-container p-4">
                    <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider mb-3">
                        Formulaire de devis
                    </p>
                    <ul class="space-y-1">
                        <li class="flex items-center gap-2">
                            <span class="{{ $chip }}">Nom & prénom</span>
                            <span class="text-on-surface-variant">identification</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="{{ $chip }}">E-mail & téléphone</span>
                            <span class="text-on-surface-variant">pour vous recontacter</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="{{ $chip }}">Société, secteur, effectif</span>
                            <span class="text-on-surface-variant">optionnels — cadrage de la proposition</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="{{ $chip }}">Description du projet</span>
                            <span class="text-on-surface-variant">pour préparer votre devis</span>
                        </li>
                    </ul>
                </div>
            </div>

            <p class="mt-4">
                Nous ne collectons pas de données sensibles (origines ethniques, opinions politiques,
                données de santé ou financières).
            </p>
        </div>
    </section>

    {{-- 3. Finalités --}}
    <section data-animate="fade-up" class="mb-12 pb-10 border-b border-primary-container/30">
        <h2 class="{{ $section }}">3. Pourquoi nous traitons ces données</h2>
        <div class="{{ $body }}">
            <p>Vos données sont utilisées exclusivement pour :</p>
            <ul class="list-none space-y-2 mt-2">
                @foreach([
                    'Répondre à votre message ou votre demande de devis',
                    'Vous envoyer un e-mail de confirmation de réception',
                    'Vous contacter par téléphone si vous l\'avez indiqué',
                    'Établir une proposition commerciale adaptée à votre projet',
                ] as $item)
                    <li class="flex items-start gap-2">
                        <span class="material-symbols-outlined text-secondary-container mt-0.5"
                              style="font-size:16px;">check_circle</span>
                        {{ $item }}
                    </li>
                @endforeach
            </ul>
            <p class="mt-4">
                Nous n'utilisons pas vos données à des fins commerciales non sollicitées,
                nous ne les revendons pas et nous ne les transmettons pas à des tiers,
                sauf obligation légale.
            </p>
        </div>
    </section>

    {{-- 4. Durée de conservation --}}
    <section data-animate="fade-up" class="mb-12 pb-10 border-b border-primary-container/30">
        <h2 class="{{ $section }}">4. Durée de conservation</h2>
        <div class="{{ $body }}">
            <p>
                Vos données sont conservées pour la durée strictement nécessaire au traitement
                de votre demande, puis archivées pour une période maximale de
                <span class="{{ $strong }}">3 ans</span> à des fins de suivi commercial.
            </p>
            <p>
                Passé ce délai, vos données sont supprimées de nos systèmes.
            </p>
        </div>
    </section>

    {{-- 5. Cookies --}}
    <section data-animate="fade-up" class="mb-12 pb-10 border-b border-primary-container/30">
        <h2 class="{{ $section }}">5. Cookies</h2>
        <div class="{{ $body }}">
            <p>
                Ce site utilise un cookie technique minimal pour mémoriser votre préférence
                de thème (mode clair / mode sombre). Ce cookie :
            </p>
            <ul class="list-none space-y-2 mt-2">
                <li class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-secondary-container mt-0.5"
                          style="font-size:16px;">check_circle</span>
                    Ne collecte aucune donnée personnelle
                </li>
                <li class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-secondary-container mt-0.5"
                          style="font-size:16px;">check_circle</span>
                    N'est pas partagé avec des tiers
                </li>
                <li class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-secondary-container mt-0.5"
                          style="font-size:16px;">check_circle</span>
                    Est stocké localement dans votre navigateur (<code class="font-mono text-sm bg-surface-container px-1">localStorage</code>)
                </li>
            </ul>
            <p class="mt-4">
                Nous n'utilisons pas de cookies publicitaires, de traceurs de navigation
                ni d'outils d'analyse comportementale.
            </p>
        </div>
    </section>

    {{-- 6. Sécurité --}}
    <section data-animate="fade-up" class="mb-12 pb-10 border-b border-primary-container/30">
        <h2 class="{{ $section }}">6. Sécurité des données</h2>
        <div class="{{ $body }}">
            <p>
                Nous mettons en œuvre des mesures techniques adaptées pour protéger
                vos données contre tout accès non autorisé, perte ou altération :
            </p>
            <ul class="list-none space-y-2 mt-2">
                <li class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-secondary-container mt-0.5"
                          style="font-size:16px;">lock</span>
                    Transmission chiffrée des formulaires (HTTPS)
                </li>
                <li class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-secondary-container mt-0.5"
                          style="font-size:16px;">lock</span>
                    Protection anti-spam et anti-robots sur tous les formulaires
                </li>
                <li class="flex items-start gap-2">
                    <span class="material-symbols-outlined text-secondary-container mt-0.5"
                          style="font-size:16px;">lock</span>
                    Envoi par e-mail chiffré (SMTPS / SSL)
                </li>
            </ul>
        </div>
    </section>

    {{-- 7. Vos droits --}}
    <section data-animate="fade-up" class="mb-12 pb-10 border-b border-primary-container/30">
        <h2 class="{{ $section }}">7. Vos droits</h2>
        <div class="{{ $body }}">
            <p>
                Vous pouvez à tout moment exercer les droits suivants en nous contactant
                par e-mail à
                <a href="mailto:{{ $company['email'] }}"
                   class="text-secondary hover:underline">{{ $company['email'] }}</a> :
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-4">
                @foreach([
                    ['icon' => 'visibility',    'title' => 'Droit d\'accès',      'desc' => 'Savoir quelles données nous détenons sur vous'],
                    ['icon' => 'edit',          'title' => 'Droit de rectification','desc' => 'Corriger des données inexactes ou incomplètes'],
                    ['icon' => 'delete',        'title' => 'Droit à l\'effacement','desc' => 'Demander la suppression de vos données'],
                    ['icon' => 'block',         'title' => 'Droit d\'opposition',  'desc' => 'Vous opposer à un traitement de vos données'],
                ] as $right)
                    <div class="bg-surface-container border border-primary-container p-4 flex items-start gap-3">
                        <span class="material-symbols-outlined text-secondary-container shrink-0"
                              style="font-size:20px;font-variation-settings:'FILL' 1;">{{ $right['icon'] }}</span>
                        <div>
                            <p class="font-body-md text-body-md font-semibold text-on-surface mb-1">
                                {{ $right['title'] }}
                            </p>
                            <p class="font-body-md text-body-md text-on-surface-variant">
                                {{ $right['desc'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <p class="mt-4">
                Nous nous engageons à répondre à toute demande dans un délai de
                <span class="{{ $strong }}">30 jours</span>.
            </p>
        </div>
    </section>

    {{-- 8. Modification --}}
    <section data-animate="fade-up" class="mb-12 pb-10 border-b border-primary-container/30">
        <h2 class="{{ $section }}">8. Modification de cette politique</h2>
        <div class="{{ $body }}">
            <p>
                Nous nous réservons le droit de modifier cette politique à tout moment.
                En cas de changement significatif, la date de mise à jour sera actualisée
                en haut de cette page. Nous vous encourageons à la consulter régulièrement.
            </p>
        </div>
    </section>

    {{-- Lien mentions légales --}}
    <div class="mt-12" data-animate="fade-up"
         class="bg-surface-container border border-primary-container p-6 flex items-start gap-4">
        <span class="material-symbols-outlined text-secondary-container shrink-0"
              style="font-variation-settings:'FILL' 1;">gavel</span>
        <p class="font-body-md text-body-md text-on-surface-variant">
            Consultez également nos
            <a href="{{ route('mentions-legales') }}"
               class="text-secondary underline underline-offset-4 hover:text-secondary-container transition-colors">
                Mentions légales
            </a>
            pour les informations relatives à l'éditeur et à l'hébergeur du site.
        </p>
    </div>

</div>

@endsection
