<?php

namespace App\Http\Controllers;

use App\Mail\ContactConfirmation;
use App\Mail\ContactMessage;
use App\Mail\DevisConfirmation;
use App\Mail\DevisRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home', [
            'services' => config('oxmosys.services'),
            'stats'    => config('oxmosys.stats'),
            'partners' => config('oxmosys.partners'),
            'company'  => config('oxmosys.company'),
        ]);
    }

    public function services()
    {
        return view('pages.services', [
            'services' => config('oxmosys.services'),
            'company'  => config('oxmosys.company'),
        ]);
    }

    public function about()
    {
        return view('pages.about', [
            'values'  => config('oxmosys.values'),
            'team'    => config('oxmosys.team'),
            'stats'   => config('oxmosys.stats'),
            'company' => config('oxmosys.company'),
        ]);
    }

    public function contact()
    {
        return view('pages.contact', [
            'contact_services' => config('oxmosys.contact_services'),
            'company'          => config('oxmosys.company'),
        ]);
    }

    public function sendContact(Request $request)
    {
        $validated = $request->validate(
            [
                'name'    => ['required', 'string', 'max:100'],
                'company' => ['nullable', 'string', 'max:100'],
                'email'   => ['required', 'email', 'max:255'],
                'phone'   => ['nullable', 'string', 'max:30'],
                'service' => ['required', 'in:audit,dev,cyber,cloud,infogerance,reseaux,integration,data,autre'],
                'message' => ['required', 'string', 'min:10', 'max:5000'],
            ],
            [
                'name.required'    => 'Votre nom complet est obligatoire.',
                'name.max'         => 'Le nom ne peut pas dépasser 100 caractères.',
                'email.required'   => 'Votre adresse e-mail est obligatoire.',
                'email.email'      => 'Veuillez saisir une adresse e-mail valide.',
                'service.required' => 'Veuillez sélectionner un service.',
                'service.in'       => 'Le service sélectionné est invalide.',
                'message.required' => 'Votre message est obligatoire.',
                'message.min'      => 'Votre message doit contenir au moins 10 caractères.',
                'message.max'      => 'Votre message ne peut pas dépasser 5 000 caractères.',
            ]
        );

        // Résoudre le label lisible du service
        $serviceLabel = collect(config('oxmosys.contact_services'))
            ->firstWhere('value', $validated['service'])['label'] ?? $validated['service'];

        $data = array_merge($validated, ['service_label' => $serviceLabel]);

        try {
            // Notification interne → contact@oxmosys.com
            Mail::to(config('mail.to_address'))->send(new ContactMessage($data));
            // Confirmation automatique → expéditeur
            Mail::to($data['email'])->send(new ContactConfirmation($data));
        } catch (\Throwable $e) {
            Log::error('Contact mail failed: ' . $e->getMessage());
        }

        return redirect()
            ->route('contact')
            ->with('success', 'Votre message a bien été envoyé. Un e-mail de confirmation vous a été adressé.');
    }

    public function sitemap()
    {
        $pages = [
            ['url' => route('home'),             'priority' => '1.0',  'changefreq' => 'monthly'],
            ['url' => route('services'),         'priority' => '0.9',  'changefreq' => 'monthly'],
            ['url' => route('about'),            'priority' => '0.8',  'changefreq' => 'monthly'],
            ['url' => route('contact'),          'priority' => '0.7',  'changefreq' => 'yearly'],
            ['url' => route('devis'),            'priority' => '0.9',  'changefreq' => 'yearly'],
            ['url' => route('mentions-legales'), 'priority' => '0.2',  'changefreq' => 'yearly'],
            ['url' => route('confidentialite'),  'priority' => '0.2',  'changefreq' => 'yearly'],
        ];

        return response()
            ->view('sitemap', ['pages' => $pages])
            ->header('Content-Type', 'application/xml');
    }

    public function mentionsLegales()
    {
        return view('pages.mentions-legales', [
            'company' => config('oxmosys.company'),
        ]);
    }

    public function confidentialite()
    {
        return view('pages.confidentialite', [
            'company' => config('oxmosys.company'),
        ]);
    }

    public function devis()
    {
        return view('pages.devis', [
            'company'         => config('oxmosys.company'),
            'services'        => config('oxmosys.services'),
            'devis_sectors'   => config('oxmosys.devis_sectors'),
            'devis_employees' => config('oxmosys.devis_employees'),
            'devis_locations' => config('oxmosys.devis_locations'),
            'devis_budgets'   => config('oxmosys.devis_budgets'),
            'devis_timelines' => config('oxmosys.devis_timelines'),
            'devis_contacts'  => config('oxmosys.devis_contacts'),
            'devis_how_found' => config('oxmosys.devis_how_found'),
        ]);
    }

    public function sendDevis(Request $request)
    {
        $validated = $request->validate(
            [
                'contact_name'        => ['required', 'string', 'max:100'],
                'company'             => ['nullable', 'string', 'max:150'],
                'sector'              => ['nullable', 'string', 'max:50'],
                'employees'           => ['nullable', 'string', 'max:20'],
                'services'            => ['required', 'array', 'min:1'],
                'services.*'          => ['string', 'max:50'],
                'budget'              => ['required', 'string', 'max:20'],
                'timeline'            => ['required', 'string', 'max:20'],
                'project_description' => ['required', 'string', 'min:20', 'max:5000'],
                'current_infra'       => ['nullable', 'string', 'max:2000'],
                'email'               => ['required', 'email', 'max:255'],
                'phone'               => ['required', 'string', 'max:30'],
                'accept_terms'        => ['accepted'],
            ],
            [
                'contact_name.required'       => 'Votre nom est obligatoire.',
                'services.required'           => 'Sélectionnez au moins un service.',
                'services.min'                => 'Sélectionnez au moins un service.',
                'budget.required'             => 'Veuillez indiquer votre budget estimé.',
                'timeline.required'           => 'Veuillez indiquer votre délai souhaité.',
                'project_description.required'=> 'La description du projet est obligatoire.',
                'project_description.min'     => 'Décrivez votre projet en au moins 20 caractères.',
                'email.required'              => 'Votre adresse e-mail est obligatoire.',
                'email.email'                 => 'Veuillez saisir une adresse e-mail valide.',
                'phone.required'              => 'Votre numéro de téléphone est obligatoire.',
                'accept_terms.accepted'       => 'Vous devez accepter les conditions pour soumettre votre demande.',
            ]
        );

        // Résoudre les labels lisibles depuis la config
        $cfg = config('oxmosys');

        $servicesLabels = collect($cfg['services'])
            ->whereIn('key', $validated['services'])
            ->pluck('title')
            ->values()
            ->all();

        $sectorLabel = !empty($validated['sector'])
            ? collect($cfg['devis_sectors'])->firstWhere('value', $validated['sector'])['label'] ?? null
            : null;

        $employeesLabel = !empty($validated['employees'])
            ? collect($cfg['devis_employees'])->firstWhere('value', $validated['employees'])['label'] ?? null
            : null;

        $budgetLabel   = collect($cfg['devis_budgets'])->firstWhere('value', $validated['budget'])['label']   ?? $validated['budget'];
        $timelineLabel = collect($cfg['devis_timelines'])->firstWhere('value', $validated['timeline'])['label'] ?? $validated['timeline'];

        $data = array_merge($validated, [
            'services_labels' => $servicesLabels,
            'sector_label'    => $sectorLabel,
            'employees_label' => $employeesLabel,
            'budget_label'    => $budgetLabel,
            'timeline_label'  => $timelineLabel,
        ]);

        try {
            // Notification interne → contact@oxmosys.com
            Mail::to(config('mail.to_address'))->send(new DevisRequest($data));
            // Confirmation automatique → expéditeur
            Mail::to($data['email'])->send(new DevisConfirmation($data));
        } catch (\Throwable $e) {
            Log::error('Devis mail failed: ' . $e->getMessage());
        }

        return redirect()
            ->route('devis')
            ->with('success', 'Votre demande de devis a bien été reçue. Un e-mail de confirmation vous a été adressé.');
    }
}
