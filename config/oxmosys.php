<?php

return [

    'company' => [
        'name'         => 'OXMOSYS-TECH',
        'tagline'      => 'Votre partenaire IT de confiance à Djibouti',
        'description'  => 'Solutions de cybersécurité, infrastructure réseau, Microsoft 365 et développement digital pour les entreprises exigeant fiabilité et performance.',
        'email'        => 'contact@oxmosys.com',
        'phone'        => '+253 77 56 11 11',
        'whatsapp'     => '+253 77 04 69 09',
        'address_line1'=> 'Quartier du Héron',
        'address_line2'=> 'Djibouti, République de Djibouti',
        'year_founded' => 2022,
        'copyright'    => '© 2026 OXMOSYS-TECH. Tous droits réservés.',
    ],

    'stats' => [
        ['value' => '4+',  'label' => "Années d'expérience"],
        ['value' => '20+',  'label' => 'Clients satisfaits'],
        ['value' => '24/7', 'label' => 'Support disponible'],
    ],

    'services' => [
        [
            'key'          => 'cyber',
            'icon'         => 'security',
            'icon_ph'      => 'ph-shield-check',
            'title'        => 'Cybersécurité',
            'description'  => 'Protection avancée de vos actifs numériques contre les menaces modernes.',
            'details'      => 'Protégez vos actifs numériques critiques avec nos solutions de sécurité de pointe. Nous identifions, prévenons et neutralisons les menaces avant qu\'elles n\'atteignent votre réseau.',
            'features'     => [
                'Audit de sécurité approfondi',
                'Détection d\'intrusion en temps réel',
                'Formation de sensibilisation pour les employés',
            ],
        ],
        [
            'key'          => 'microsoft365',
            'icon'         => 'cloud',
            'icon_ph'      => 'ph-windows-logo',
            'title'        => 'Microsoft 365',
            'description'  => 'Déploiement et gestion de votre environnement collaboratif cloud.',
            'details'      => 'Optimisez la collaboration et la productivité de votre équipe avec un déploiement et une gestion sur mesure de l\'écosystème Microsoft 365.',
            'features'     => [
                'Migration fluide et sécurisée',
                'Configuration experte de Teams et SharePoint',
                'Gestion des licences et support continu',
            ],
        ],
        [
            'key'          => 'kaspersky',
            'icon'         => 'verified_user',
            'icon_ph'      => 'ph-bug-beetle',
            'title'        => 'Kaspersky Lab',
            'description'  => 'Solutions antivirus endpoint et sécurité réseau d\'entreprise intégrée.',
            'details'      => 'Implémentation et gestion des solutions antivirus et endpoint security de pointe de Kaspersky pour une protection robuste contre les malwares.',
            'features'     => [
                'Protection avancée des terminaux',
                'Analyse comportementale des menaces',
                'Console de gestion centralisée',
            ],
        ],
        [
            'key'          => 'reseaux',
            'icon'         => 'hub',
            'icon_ph'      => 'ph-network',
            'title'        => 'Infrastructures Réseaux',
            'description'  => 'Conception, câblage et configuration de réseaux locaux et étendus robustes.',
            'details'      => 'Architecture et déploiement d\'infrastructures réseau performantes et évolutives adaptées aux besoins de votre entreprise.',
            'features'     => [
                'Conception et câblage réseau',
                'Configuration switches et routeurs',
                'Supervision et maintenance réseau',
            ],
        ],
        [
            'key'          => 'firewall',
            'icon'         => 'router',
            'icon_ph'      => 'ph-shield-network',
            'title'        => 'Firewall & Routage',
            'description'  => 'Sécurisation périmétrique et gestion optimisée du trafic de données.',
            'details'      => 'Déploiement et configuration de solutions firewall avancées pour une protection périmétrique robuste de votre réseau d\'entreprise.',
            'features'     => [
                'Configuration et gestion des firewalls',
                'Politique de sécurité sur mesure',
                'Supervision et alertes en temps réel',
            ],
        ],
        [
            'key'          => 'manages',
            'icon'         => 'manage_accounts',
            'icon_ph'      => 'ph-wrench',
            'title'        => 'Services Managés',
            'description'  => 'Infogérance complète de votre parc informatique pour une tranquillité d\'esprit.',
            'details'      => 'Confiez-nous la gestion complète de votre infrastructure IT pour vous concentrer sur votre cœur de métier.',
            'features'     => [
                'Supervision proactive 24/7',
                'Maintenance préventive et corrective',
                'Reporting et tableaux de bord',
            ],
        ],
        [
            'key'          => 'cloud',
            'icon'         => 'dns',
            'icon_ph'      => 'ph-cloud',
            'title'        => 'Cloud Computing',
            'description'  => 'Migration et hébergement de vos données sur des serveurs virtuels sécurisés.',
            'details'      => 'Accompagnement dans votre transition vers le cloud avec des solutions adaptées à vos besoins et contraintes.',
            'features'     => [
                'Audit et stratégie cloud',
                'Migration et hybridation',
                'Optimisation des coûts cloud',
            ],
        ],
        [
            'key'          => 'support',
            'icon'         => 'support_agent',
            'icon_ph'      => 'ph-headset',
            'title'        => 'Support IT 24/7',
            'description'  => 'Assistance technique réactive pour minimiser les temps d\'arrêt.',
            'details'      => 'Service d\'assistance technique disponible en permanence pour résoudre vos incidents et maintenir la continuité de votre activité.',
            'features'     => [
                'Helpdesk et ticketing',
                'Intervention sur site rapide',
                'SLA garantis et reportings',
            ],
        ],
        [
            'key'          => 'dev',
            'icon'         => 'code',
            'icon_ph'      => 'ph-code',
            'title'        => 'Développement',
            'description'  => 'Création d\'applications sur mesure et de présences digitales performantes.',
            'details'      => 'Conception et développement de solutions digitales personnalisées adaptées à vos processus métier spécifiques.',
            'features'     => [
                'Applications web et mobiles',
                'Intégration API et systèmes',
                'Maintenance et évolution',
            ],
        ],
    ],

    'partners' => [
        ['name' => 'Microsoft',       'logo' => 'images/partners/microsoft.svg',     'description' => 'Partenaire certifié Microsoft 365'],
        ['name' => 'Huawei',          'logo' => 'images/partners/huawei.svg',        'description' => 'Partenaire équipements Huawei'],
        ['name' => 'Kaspersky',       'logo' => 'images/partners/kaspersky.svg',     'description' => 'Revendeur officiel Kaspersky'],
        ['name' => 'Cisco',           'logo' => 'images/partners/cisco.svg',         'description' => 'Partenaire réseau Cisco'],
        ['name' => 'HPE',             'logo' => 'images/partners/hpe.svg',           'description' => 'Partenaire Hewlett Packard Enterprise'],
        ['name' => 'Dell',            'logo' => 'images/partners/dell.svg',          'description' => 'Revendeur matériel Dell'],
        ['name' => 'HP',              'logo' => 'images/partners/hp.svg',            'description' => 'Partenaire HP'],
        ['name' => 'Fortinet',        'logo' => 'images/partners/fortinet.svg',      'description' => 'Partenaire sécurité Fortinet'],
        ['name' => 'Cloudmania',      'logo' => 'images/partners/cloudmania.svg',    'description' => 'Partenaire cloud Cloudmania'],
        ['name' => 'Liquid Telecom',  'logo' => 'images/partners/liquid-telecom.svg','description' => 'Partenaire télécom Liquid Telecom'],
    ],

    'values' => [
        [
            'icon'        => 'lightbulb',
            'title'       => 'Innovation',
            'description' => 'Anticiper les ruptures technologiques pour concevoir les standards de demain.',
        ],
        [
            'icon'        => 'verified',
            'title'       => 'Fiabilité',
            'description' => 'Des architectures robustes garantissant une continuité d\'activité absolue.',
        ],
        [
            'icon'        => 'handshake',
            'title'       => 'Proximité',
            'description' => 'Un partenariat stratégique étroit pour comprendre et servir vos enjeux uniques.',
        ],
        [
            'icon'        => 'military_tech',
            'title'       => 'Excellence',
            'description' => 'Une exécution sans faille, guidée par les plus hauts standards de l\'ingénierie.',
        ],
    ],

    'team' => [
        [
            'name'    => 'Jean Dupont',
            'initials'=> 'JD',
            'role'    => 'Directeur Général',
            'bio'     => 'Expert en architecture système avec plus de 15 ans d\'expérience dans la transformation numérique des grandes entreprises.',
        ],
        [
            'name'    => 'Marie Claire',
            'initials'=> 'MC',
            'role'    => 'Chief Technology Officer',
            'bio'     => 'Pionnière dans le déploiement d\'infrastructures cloud hybrides et la cybersécurité avancée.',
        ],
        [
            'name'    => 'Ahmed Hassan',
            'initials'=> 'AH',
            'role'    => 'Lead Infrastructure',
            'bio'     => 'Spécialiste de l\'optimisation des réseaux à très haut débit et de la résilience des data centers.',
        ],
    ],

    'contact_services' => [
        ['value' => 'audit',       'label' => '1. Audit & Conseil IT'],
        ['value' => 'dev',         'label' => '2. Développement Logiciel Sur Mesure'],
        ['value' => 'cyber',       'label' => '3. Cybersécurité & Protection des données'],
        ['value' => 'cloud',       'label' => '4. Solutions Cloud & Hébergement'],
        ['value' => 'infogerance', 'label' => '5. Infogérance & Support Technique'],
        ['value' => 'reseaux',     'label' => '6. Architecture Réseaux & Télécoms'],
        ['value' => 'integration', 'label' => '7. Intégration de Systèmes'],
        ['value' => 'data',        'label' => '8. Analyse de Données & BI'],
        ['value' => 'autre',       'label' => '9. Autre demande'],
    ],

    /* ================================================================
     * RÉFÉRENCES CLIENTS — Entreprises djiboutiennes partenaires
     * ============================================================== */
    'clients' => [
        [
            'name'   => 'ANT',
            'full'   => 'Agence Nationale du Tourisme de Djibouti',
            'sector' => 'Tourisme & Secteur public',
            'logo'   => 'images/clients/ant.png',
        ],
        [
            'name'   => 'IGE',
            'full'   => 'Inspection Générale d\'État de Djibouti',
            'sector' => 'Secteur public',
            'logo'   => 'images/clients/ige.png',
        ],
        [
            'name'   => 'ANEFIP',
            'full'   => 'Agence Nationale de l\'Emploi, de la Formation et de l\'Insertion Professionnelle',
            'sector' => 'Emploi & Formation',
            'logo'   => 'images/clients/anefip.png',
        ],
        [
            'name'   => 'CLE',
            'full'   => 'Centre de Leadership et de l\'Entrepreneuriat',
            'sector' => 'Formation & Entrepreneuriat',
            'logo'   => 'images/clients/cle.png',
        ],
        [
            'name'   => 'MDENI',
            'full'   => 'Ministère Délégué à l\'Économie Numérique et à l\'Innovation',
            'sector' => 'Numérique & Innovation',
            'logo'   => 'images/clients/mdeni.png',
        ],
        [
            'name'   => 'HODAN CONSTRUCTION',
            'full'   => 'Hodan Construction SARL',
            'sector' => 'BTP & Construction',
            'logo'   => 'images/clients/hodan-construction.png',
        ],
    ],

    /* ================================================================
     * FAQ — Questions fréquentes (page Services)
     * ============================================================== */
    'faq' => [
        [
            'question' => 'Quels types d\'entreprises accompagnez-vous ?',
            'answer'   => 'Nous intervenons auprès de toutes les structures : PME, grandes entreprises, institutions publiques et ONG. Nos solutions s\'adaptent à votre taille et à votre secteur d\'activité, que vous soyez à Djibouti ou dans la région.',
        ],
        [
            'question' => 'Proposez-vous des contrats de maintenance et de support ?',
            'answer'   => 'Oui. Nous proposons des contrats de services managés avec des niveaux de SLA adaptés à vos besoins : supervision 24/7, maintenance préventive, interventions correctives sur site et à distance.',
        ],
        [
            'question' => 'Combien de temps faut-il pour obtenir un devis ?',
            'answer'   => 'Après réception de votre demande via le formulaire de devis, un expert vous contacte sous 24 heures ouvrées pour un premier échange. La proposition formelle est généralement remise dans les 3 à 5 jours ouvrés selon la complexité du projet.',
        ],
        [
            'question' => 'Travaillez-vous avec des équipements de marques spécifiques ?',
            'answer'   => 'Nous sommes partenaires de Microsoft, Kaspersky, Cisco, Dell, HP et Fortinet. Nous pouvons cependant intervenir sur d\'autres équipements selon les besoins. Notre priorité est de recommander la solution la plus adaptée à votre contexte.',
        ],
        [
            'question' => 'Intervenez-vous en dehors de Djibouti ?',
            'answer'   => 'Oui, nous intervenons dans les pays de la sous-région : Éthiopie, Somalie, Érythrée et Kenya. Certaines missions peuvent être réalisées à distance pour les clients hors de Djibouti.',
        ],
        [
            'question' => 'Vos équipes sont-elles certifiées ?',
            'answer'   => 'Notre équipe technique est composée d\'ingénieurs certifiés sur les technologies que nous déployons (Microsoft, Cisco, Kaspersky). Nous investissons continuellement dans la formation pour rester au niveau des dernières évolutions.',
        ],
    ],

    /* ================================================================
     * DEVIS — Données du formulaire multi-étapes
     * ============================================================== */

    'devis_sectors' => [
        ['value' => 'tech',       'label' => 'Technologies & Informatique'],
        ['value' => 'finance',    'label' => 'Finance, Banque & Assurance'],
        ['value' => 'sante',      'label' => 'Santé & Pharmaceutique'],
        ['value' => 'education',  'label' => 'Éducation & Formation'],
        ['value' => 'commerce',   'label' => 'Commerce & Distribution'],
        ['value' => 'gouv',       'label' => 'Gouvernement & Secteur public'],
        ['value' => 'transport',  'label' => 'Transport & Logistique'],
        ['value' => 'telecom',    'label' => 'Télécommunications'],
        ['value' => 'hotellerie', 'label' => 'Hôtellerie & Tourisme'],
        ['value' => 'industrie',  'label' => 'Industrie & Manufacture'],
        ['value' => 'ong',        'label' => 'ONG & Organisations Internationales'],
        ['value' => 'autre',      'label' => 'Autre secteur'],
    ],

    'devis_employees' => [
        ['value' => '1-10',   'label' => '1 – 10 employés  (TPE)'],
        ['value' => '11-50',  'label' => '11 – 50 employés  (PE)'],
        ['value' => '51-200', 'label' => '51 – 200 employés  (ME)'],
        ['value' => '201-500','label' => '201 – 500 employés'],
        ['value' => '500+',   'label' => 'Plus de 500 employés'],
    ],

    'devis_locations' => [
        ['value' => 'djibouti-ville', 'label' => 'Djibouti (Ville)'],
        ['value' => 'ali-sabieh',     'label' => 'Région Ali Sabieh'],
        ['value' => 'dikhil',         'label' => 'Région Dikhil'],
        ['value' => 'obock',          'label' => 'Région Obock'],
        ['value' => 'tadjourah',      'label' => 'Région Tadjourah'],
        ['value' => 'ethiopie',       'label' => 'Éthiopie'],
        ['value' => 'somalie',        'label' => 'Somalie'],
        ['value' => 'erythree',       'label' => 'Érythrée'],
        ['value' => 'kenya',          'label' => 'Kenya'],
        ['value' => 'autre',          'label' => 'Autre pays'],
    ],

    'devis_budgets' => [
        ['value' => 'lt500k',   'label' => 'Moins de 500 000 FDJ'],
        ['value' => '500k-2m',  'label' => '500 000 – 2 000 000 FDJ'],
        ['value' => '2m-5m',    'label' => '2 000 000 – 5 000 000 FDJ'],
        ['value' => '5m-10m',   'label' => '5 000 000 – 10 000 000 FDJ'],
        ['value' => 'gt10m',    'label' => 'Plus de 10 000 000 FDJ'],
        ['value' => 'undefined','label' => 'Budget à définir ensemble'],
    ],

    'devis_timelines' => [
        ['value' => 'urgent',   'label' => 'Urgent (moins d\'1 mois)'],
        ['value' => '1-3m',     'label' => '1 à 3 mois'],
        ['value' => '3-6m',     'label' => '3 à 6 mois'],
        ['value' => '6-12m',    'label' => '6 à 12 mois'],
        ['value' => 'gt12m',    'label' => 'Plus d\'un an'],
        ['value' => 'flexible', 'label' => 'Flexible / pas de contrainte'],
    ],

    'devis_contacts' => [
        ['value' => 'email',    'label' => 'E-mail'],
        ['value' => 'phone',    'label' => 'Téléphone'],
        ['value' => 'whatsapp', 'label' => 'WhatsApp'],
        ['value' => 'visio',    'label' => 'Visioconférence (Teams / Zoom)'],
    ],

    'devis_how_found' => [
        ['value' => 'google',      'label' => 'Recherche Google / internet'],
        ['value' => 'recommand',   'label' => 'Recommandation d\'un tiers'],
        ['value' => 'social',      'label' => 'Réseaux sociaux'],
        ['value' => 'partenaire',  'label' => 'Un partenaire OXMOSYS-TECH'],
        ['value' => 'evenement',   'label' => 'Événement / salon professionnel'],
        ['value' => 'autre',       'label' => 'Autre'],
    ],

];
