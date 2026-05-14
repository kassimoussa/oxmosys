<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Demande de devis — {{ $data['contact_name'] }}</title>
</head>
<body style="margin:0;padding:0;background-color:#f4f6ff;font-family:'Inter',Arial,sans-serif;color:#181c2e;">

<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6ff;padding:32px 16px;">
<tr><td align="center">
<table width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;">

    {{-- Header --}}
    <tr>
        <td style="background-color:#0e1322;padding:32px 40px;border-bottom:3px solid #e1721a;">
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <p style="margin:0;font-size:22px;font-weight:800;color:#ffffff;letter-spacing:-0.02em;">
                            OXMOSYS-TECH
                        </p>
                        <p style="margin:4px 0 0;font-size:11px;color:#8e909d;letter-spacing:0.12em;text-transform:uppercase;font-family:'Courier New',monospace;">
                            Nouvelle demande de devis
                        </p>
                    </td>
                    <td align="right">
                        <span style="display:inline-block;background:#e1721a;color:#ffffff;font-size:10px;font-family:'Courier New',monospace;letter-spacing:0.1em;text-transform:uppercase;padding:6px 12px;font-weight:700;">
                            Devis
                        </span>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    {{-- Body --}}
    <tr>
        <td style="background-color:#ffffff;padding:40px;">

            <p style="margin:0 0 28px;font-size:16px;color:#44475a;line-height:1.6;">
                Une nouvelle demande de devis a été soumise. Voici le récapitulatif complet.
            </p>

            {{-- Étape 1 — Entreprise --}}
            <table width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #c5cdf0;margin-bottom:20px;">
                <tr>
                    <td style="background:#1b3a8a;padding:10px 16px;">
                        <p style="margin:0;font-size:10px;color:#b5c4ff;letter-spacing:0.12em;text-transform:uppercase;font-family:'Courier New',monospace;">
                            01 — Entreprise
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="padding:16px;">
                        <table width="100%" cellpadding="6" cellspacing="0">
                            <tr>
                                <td width="35%" style="font-size:11px;color:#767690;font-family:'Courier New',monospace;text-transform:uppercase;letter-spacing:0.08em;vertical-align:top;">Contact</td>
                                <td style="font-size:15px;color:#181c2e;font-weight:600;">{{ $data['contact_name'] }}</td>
                            </tr>
                            @if(!empty($data['company']))
                            <tr>
                                <td style="font-size:11px;color:#767690;font-family:'Courier New',monospace;text-transform:uppercase;letter-spacing:0.08em;">Société</td>
                                <td style="font-size:15px;color:#181c2e;">{{ $data['company'] }}</td>
                            </tr>
                            @endif
                            @if(!empty($data['sector_label']))
                            <tr>
                                <td style="font-size:11px;color:#767690;font-family:'Courier New',monospace;text-transform:uppercase;letter-spacing:0.08em;">Secteur</td>
                                <td style="font-size:15px;color:#181c2e;">{{ $data['sector_label'] }}</td>
                            </tr>
                            @endif
                            @if(!empty($data['employees_label']))
                            <tr>
                                <td style="font-size:11px;color:#767690;font-family:'Courier New',monospace;text-transform:uppercase;letter-spacing:0.08em;">Effectif</td>
                                <td style="font-size:15px;color:#181c2e;">{{ $data['employees_label'] }}</td>
                            </tr>
                            @endif
                        </table>
                    </td>
                </tr>
            </table>

            {{-- Étape 2 — Services --}}
            <table width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #c5cdf0;margin-bottom:20px;">
                <tr>
                    <td style="background:#1b3a8a;padding:10px 16px;">
                        <p style="margin:0;font-size:10px;color:#b5c4ff;letter-spacing:0.12em;text-transform:uppercase;font-family:'Courier New',monospace;">
                            02 — Services souhaités
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="padding:16px;">
                        @foreach($data['services_labels'] as $label)
                            <span style="display:inline-block;background:#eef0fb;border:1px solid #c5cdf0;color:#1b3a8a;font-size:12px;padding:4px 10px;margin:3px 3px 3px 0;font-family:'Courier New',monospace;">
                                {{ $label }}
                            </span>
                        @endforeach
                    </td>
                </tr>
            </table>

            {{-- Étape 3 — Cadrage --}}
            <table width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #c5cdf0;margin-bottom:20px;">
                <tr>
                    <td style="background:#1b3a8a;padding:10px 16px;">
                        <p style="margin:0;font-size:10px;color:#b5c4ff;letter-spacing:0.12em;text-transform:uppercase;font-family:'Courier New',monospace;">
                            03 — Cadrage projet
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="padding:16px;">
                        <table width="100%" cellpadding="6" cellspacing="0">
                            <tr>
                                <td width="35%" style="font-size:11px;color:#767690;font-family:'Courier New',monospace;text-transform:uppercase;letter-spacing:0.08em;vertical-align:top;">Budget</td>
                                <td>
                                    <span style="display:inline-block;background:#fff3eb;border:1px solid #e1721a;color:#c05800;font-size:12px;font-weight:700;padding:4px 12px;font-family:'Courier New',monospace;">
                                        {{ $data['budget_label'] }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size:11px;color:#767690;font-family:'Courier New',monospace;text-transform:uppercase;letter-spacing:0.08em;vertical-align:top;">Délai</td>
                                <td style="font-size:15px;color:#181c2e;">{{ $data['timeline_label'] }}</td>
                            </tr>
                        </table>
                        <div style="margin-top:16px;padding-top:16px;border-top:1px solid #e8eaf5;">
                            <p style="margin:0 0 8px;font-size:11px;color:#767690;font-family:'Courier New',monospace;text-transform:uppercase;letter-spacing:0.08em;">Description du projet</p>
                            <p style="margin:0;font-size:15px;color:#181c2e;line-height:1.7;white-space:pre-line;">{{ $data['project_description'] }}</p>
                        </div>
                        @if(!empty($data['current_infra']))
                        <div style="margin-top:16px;padding-top:16px;border-top:1px solid #e8eaf5;">
                            <p style="margin:0 0 8px;font-size:11px;color:#767690;font-family:'Courier New',monospace;text-transform:uppercase;letter-spacing:0.08em;">Infrastructure actuelle</p>
                            <p style="margin:0;font-size:14px;color:#44475a;line-height:1.7;white-space:pre-line;">{{ $data['current_infra'] }}</p>
                        </div>
                        @endif
                    </td>
                </tr>
            </table>

            {{-- Étape 4 — Coordonnées --}}
            <table width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #c5cdf0;margin-bottom:32px;">
                <tr>
                    <td style="background:#1b3a8a;padding:10px 16px;">
                        <p style="margin:0;font-size:10px;color:#b5c4ff;letter-spacing:0.12em;text-transform:uppercase;font-family:'Courier New',monospace;">
                            04 — Coordonnées
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="padding:16px;">
                        <table width="100%" cellpadding="6" cellspacing="0">
                            <tr>
                                <td width="35%" style="font-size:11px;color:#767690;font-family:'Courier New',monospace;text-transform:uppercase;letter-spacing:0.08em;">E-mail</td>
                                <td style="font-size:15px;color:#1b3a8a;">
                                    <a href="mailto:{{ $data['email'] }}" style="color:#1b3a8a;text-decoration:none;">{{ $data['email'] }}</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size:11px;color:#767690;font-family:'Courier New',monospace;text-transform:uppercase;letter-spacing:0.08em;">Téléphone</td>
                                <td style="font-size:15px;color:#181c2e;">{{ $data['phone'] }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            {{-- CTA --}}
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <td style="background:#e1721a;padding:14px 28px;">
                        <a href="mailto:{{ $data['email'] }}" style="color:#ffffff;font-size:12px;font-family:'Courier New',monospace;letter-spacing:0.1em;text-transform:uppercase;text-decoration:none;font-weight:700;">
                            Répondre à {{ $data['contact_name'] }}
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    {{-- Footer --}}
    <tr>
        <td style="background:#e8eaf5;border-top:1px solid #c5cdf0;padding:20px 40px;">
            <p style="margin:0;font-size:11px;color:#767690;line-height:1.6;">
                Demande reçue le {{ now()->format('d/m/Y à H:i') }} depuis
                <strong style="color:#1b3a8a;">oxmosys-tech.dj/devis</strong>.
                Répondre sous 24 h ouvrées.
            </p>
        </td>
    </tr>

</table>
</td></tr>
</table>
</body>
</html>
