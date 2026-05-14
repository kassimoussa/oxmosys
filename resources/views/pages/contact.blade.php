@extends('layouts.app')

@section('title', 'Contact')
@section('meta_description', 'Contactez OXMOSYS-TECH à Djibouti pour vos projets IT. Notre équipe d\'experts est disponible pour analyser vos besoins.')

@section('content')

<div class="pb-24 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto w-full">

    {{-- ===== HERO BANNER ===== --}}
    <div class="pt-12 mb-16 border-l-4 border-secondary pl-6">
        <h1 class="hero-el hero-fade-up hero-d0 font-headline-xl text-headline-xl-mobile md:text-headline-xl
                   font-extrabold text-on-surface uppercase tracking-tight">
            Contactez-nous
        </h1>
        <p class="hero-el hero-fade-up hero-d1 font-body-lg text-body-lg text-on-surface-variant mt-4 max-w-2xl">
            Prêt à optimiser votre infrastructure technologique ? Notre équipe d'experts à Djibouti
            est à votre disposition pour analyser vos besoins et concevoir des solutions sur-mesure.
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

    {{-- ===== SUCCESS MESSAGE ===== --}}
    @if(session('success'))
        <div data-animate="fade-up"
             class="mb-8 flex items-start gap-4 bg-surface-container border border-tertiary p-6">
            <span class="material-symbols-outlined text-tertiary shrink-0"
                  style="font-variation-settings:'FILL' 1;">check_circle</span>
            <p class="font-body-md text-body-md text-on-surface">{{ session('success') }}</p>
        </div>
    @endif

    {{-- ===== 2-COLUMN LAYOUT ===== --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start">

        {{-- ===== FORM (7/12) ===== --}}
        <div data-animate="fade-right"
             class="lg:col-span-7 bg-surface-container border border-primary-container p-6 md:p-10
                    group hover:border-secondary transition-colors duration-300 relative">
            <div class="absolute top-0 right-0 w-3 h-3 bg-primary-container
                        group-hover:bg-secondary-container transition-colors duration-300"></div>

            <form action="{{ route('contact.send') }}" method="POST" class="flex flex-col gap-6" novalidate>
                @csrf
                <x-honeypot />

                {{-- Name + Company --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2">
                        <label for="name"
                               class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">
                            Nom complet <span class="text-secondary-container">*</span>
                        </label>
                        <input type="text" id="name" name="name"
                               value="{{ old('name') }}"
                               placeholder="Ex : Mohamed Ali"
                               autocomplete="name"
                               class="bg-surface text-on-surface font-body-md text-body-md px-4 py-3 border
                                      focus:outline-none transition-colors placeholder:text-outline rounded-none
                                      {{ $errors->has('name')
                                          ? 'border-error focus:border-error'
                                          : 'border-primary-container focus:border-secondary focus:ring-1 focus:ring-secondary' }}">
                        @error('name')
                            <p class="font-label-sm text-label-sm text-error flex items-center gap-1">
                                <span class="material-symbols-outlined" style="font-size:14px;">error</span>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="company"
                               class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">
                            Société
                        </label>
                        <input type="text" id="company" name="company"
                               value="{{ old('company') }}"
                               placeholder="Votre entreprise"
                               autocomplete="organization"
                               class="bg-surface text-on-surface font-body-md text-body-md px-4 py-3 border
                                      focus:outline-none transition-colors placeholder:text-outline rounded-none
                                      {{ $errors->has('company')
                                          ? 'border-error'
                                          : 'border-primary-container focus:border-secondary focus:ring-1 focus:ring-secondary' }}">
                        @error('company')
                            <p class="font-label-sm text-label-sm text-error flex items-center gap-1">
                                <span class="material-symbols-outlined" style="font-size:14px;">error</span>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                {{-- Email + Phone --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex flex-col gap-2">
                        <label for="email"
                               class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">
                            Adresse e-mail <span class="text-secondary-container">*</span>
                        </label>
                        <input type="email" id="email" name="email"
                               value="{{ old('email') }}"
                               placeholder="contact@entreprise.com"
                               autocomplete="email"
                               class="bg-surface text-on-surface font-body-md text-body-md px-4 py-3 border
                                      focus:outline-none transition-colors placeholder:text-outline rounded-none
                                      {{ $errors->has('email')
                                          ? 'border-error focus:border-error'
                                          : 'border-primary-container focus:border-secondary focus:ring-1 focus:ring-secondary' }}">
                        @error('email')
                            <p class="font-label-sm text-label-sm text-error flex items-center gap-1">
                                <span class="material-symbols-outlined" style="font-size:14px;">error</span>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="phone"
                               class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">
                            Téléphone
                        </label>
                        <input type="tel" id="phone" name="phone"
                               value="{{ old('phone') }}"
                               placeholder="+253 00 00 00 00"
                               autocomplete="tel"
                               class="bg-surface text-on-surface font-body-md text-body-md px-4 py-3
                                      border border-primary-container focus:border-secondary focus:ring-1
                                      focus:ring-secondary focus:outline-none transition-colors
                                      placeholder:text-outline rounded-none">
                    </div>
                </div>

                {{-- Service --}}
                <div class="flex flex-col gap-2">
                    <label for="service"
                           class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">
                        Service concerné <span class="text-secondary-container">*</span>
                    </label>
                    <div class="relative">
                        <select id="service" name="service"
                                class="w-full bg-surface text-on-surface font-body-md text-body-md
                                       px-4 py-3 appearance-none focus:outline-none transition-colors
                                       rounded-none cursor-pointer border
                                       {{ $errors->has('service')
                                           ? 'border-error focus:border-error'
                                           : 'border-primary-container focus:border-secondary focus:ring-1 focus:ring-secondary' }}">
                            <option value="" disabled {{ old('service') ? '' : 'selected' }}>
                                Sélectionnez un domaine d'expertise
                            </option>
                            @foreach($contact_services as $svc)
                                <option value="{{ $svc['value'] }}"
                                        {{ old('service') === $svc['value'] ? 'selected' : '' }}>
                                    {{ $svc['label'] }}
                                </option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4
                                    text-on-surface-variant">
                            <span class="material-symbols-outlined" style="font-size:20px;">expand_more</span>
                        </div>
                    </div>
                    @error('service')
                        <p class="font-label-sm text-label-sm text-error flex items-center gap-1">
                            <span class="material-symbols-outlined" style="font-size:14px;">error</span>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Message --}}
                <div class="flex flex-col gap-2">
                    <label for="message"
                           class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">
                        Votre message <span class="text-secondary-container">*</span>
                    </label>
                    <textarea id="message" name="message" rows="5"
                              placeholder="Détaillez votre projet ou votre problématique technique…"
                              class="bg-surface text-on-surface font-body-md text-body-md px-4 py-3
                                     focus:outline-none transition-colors placeholder:text-outline
                                     resize-y min-h-30 rounded-none border
                                     {{ $errors->has('message')
                                         ? 'border-error focus:border-error'
                                         : 'border-primary-container focus:border-secondary focus:ring-1 focus:ring-secondary' }}">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="font-label-sm text-label-sm text-error flex items-center gap-1">
                            <span class="material-symbols-outlined" style="font-size:14px;">error</span>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Submit --}}
                <div class="pt-4">
                    <button type="submit"
                            class="btn-ripple inline-flex items-center justify-center gap-3
                                   bg-secondary text-on-secondary border border-secondary
                                   hover:bg-transparent hover:text-secondary transition-all duration-300
                                   font-label-sm text-label-sm uppercase tracking-widest px-8 py-4
                                   w-full md:w-auto">
                        <span class="material-symbols-outlined" style="font-size:20px;">send</span>
                        Envoyer le message
                    </button>
                </div>
            </form>
        </div>

        {{-- ===== INFOS (5/12) ===== --}}
        <div class="lg:col-span-5 flex flex-col gap-8">

            {{-- Coordonnées --}}
            <div data-animate="fade-left"
                 class="bg-surface border border-primary-container p-6 md:p-8 relative">
                <h2 class="font-headline-md text-headline-md font-bold text-on-surface mb-6
                           border-b border-primary-container pb-4">
                    Coordonnées
                </h2>
                <ul class="flex flex-col gap-6">
                    @php
                        $infos = [
                            ['icon' => 'location_on', 'label' => 'Siège Social',
                             'content' => $company['address_line1'].'<br>'.$company['address_line2'],
                             'href' => null],
                            ['icon' => 'mail', 'label' => 'Support & Renseignements',
                             'content' => $company['email'],
                             'href' => 'mailto:'.$company['email']],
                            ['icon' => 'call', 'label' => 'Ligne Directe',
                             'content' => $company['phone'],
                             'href' => 'tel:'.preg_replace('/\s+/', '', $company['phone'])],
                            ['icon' => 'chat', 'label' => 'WhatsApp Business',
                             'content' => $company['whatsapp'],
                             'href' => 'https://wa.me/'.preg_replace('/[^0-9]/', '', $company['whatsapp'])],
                        ];
                    @endphp

                    @foreach($infos as $i => $info)
                        <li class="flex items-start gap-4" data-animate="fade-left" data-delay="{{ $i * 100 }}">
                            <div class="mt-1 w-10 h-10 bg-primary-container border border-primary-container
                                        text-secondary flex items-center justify-center shrink-0
                                        transition-colors duration-300 hover:bg-secondary-container hover:border-secondary-container">
                                <span class="material-symbols-outlined" style="font-size:20px;">{{ $info['icon'] }}</span>
                            </div>
                            <div>
                                <h3 class="font-label-sm text-label-sm text-on-surface-variant
                                           uppercase tracking-wider mb-1">
                                    {{ $info['label'] }}
                                </h3>
                                @if($info['href'])
                                    <a href="{{ $info['href'] }}"
                                       {{ str_starts_with($info['href'], 'https') ? 'target=_blank rel=noopener' : '' }}
                                       class="font-body-md text-body-md text-on-surface hover:text-secondary transition-colors">
                                        {!! $info['content'] !!}
                                    </a>
                                @else
                                    <p class="font-body-md text-body-md text-on-surface">
                                        {!! $info['content'] !!}
                                    </p>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Google Maps --}}
            <div data-animate="fade-up"
                 class="relative border border-primary-container overflow-hidden group">

                {{-- Bordure hover --}}
                <div class="absolute inset-0 border-2 border-transparent group-hover:border-secondary
                            transition-colors duration-500 z-10 pointer-events-none"></div>

                {{-- Carte Google Maps — Quartier du Héron, Djibouti --}}
                <iframe
                    src="https://maps.google.com/maps?q=Djibouti&z=8&output=embed&hl=fr"
                    width="100%"
                    height="320"
                    style="border:0; display:block; filter: grayscale(30%) contrast(1.05);"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Localisation OXMOSYS-TECH — Quartier du Héron, Djibouti">
                </iframe>

                {{-- Badge zone --}}
                <div class="absolute bottom-3 left-3 z-20 flex flex-col gap-1 items-start">
                    <span class="font-headline-lg text-headline-lg font-extrabold text-white tracking-tight
                                 drop-shadow-[0_2px_8px_rgba(0,0,0,0.8)]">
                        DJIBOUTI
                    </span>
                    <span class="inline-flex items-center gap-1.5 bg-surface/95 border border-primary-container
                                 px-3 py-1.5 font-label-sm text-label-sm text-on-surface uppercase tracking-widest
                                 shadow-lg">
                        <span class="w-2 h-2 rounded-full bg-secondary-container animate-pulse shrink-0"></span>
                        Quartier du Héron
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
