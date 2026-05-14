<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Votre message a bien été reçu — OXMOSYS-TECH</title>
</head>
<body style="margin:0;padding:0;background-color:#f4f6ff;font-family:'Inter',Arial,sans-serif;color:#181c2e;">

<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6ff;padding:32px 16px;">
<tr><td align="center">
<table width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;">

    {{-- ===== HEADER ===== --}}
    <tr>
        <td style="background-color:#0e1322;padding:28px 40px;border-bottom:3px solid #e1721a;">
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="vertical-align:middle;">
                        <img src="{{ config('app.url') }}/images/logo.png"
                             alt="OXMOSYS-TECH"
                             width="48" height="48"
                             style="display:inline-block;vertical-align:middle;margin-right:12px;">
                        <span style="font-size:20px;font-weight:800;color:#ffffff;vertical-align:middle;letter-spacing:-0.02em;">
                            OXMOSYS-TECH
                        </span>
                    </td>
                    <td align="right" style="vertical-align:middle;">
                        <span style="font-size:10px;color:#8e909d;letter-spacing:0.12em;text-transform:uppercase;font-family:'Courier New',monospace;">
                            Confirmation
                        </span>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    {{-- ===== HERO ===== --}}
    <tr>
        <td style="background-color:#ffffff;padding:40px 40px 0;">
            <p style="margin:0 0 6px;font-size:11px;color:#e1721a;font-family:'Courier New',monospace;letter-spacing:0.12em;text-transform:uppercase;">
                Message reçu
            </p>
            <h1 style="margin:0 0 16px;font-size:26px;font-weight:800;color:#0e1322;line-height:1.2;">
                Merci, {{ $data['name'] }} !
            </h1>
            <p style="margin:0 0 32px;font-size:16px;color:#44475a;line-height:1.7;">
                Nous avons bien reçu votre message. Notre équipe l'a pris en charge
                et vous contactera <strong style="color:#0e1322;">dans les meilleurs délais</strong>.
            </p>
        </td>
    </tr>

    {{-- ===== RÉCAPITULATIF ===== --}}
    <tr>
        <td style="background-color:#ffffff;padding:0 40px 40px;">
            <table width="100%" cellpadding="0" cellspacing="0"
                   style="border:1px solid #c5cdf0;border-top:3px solid #1b3a8a;">
                <tr>
                    <td style="background:#eef0fb;padding:12px 20px;border-bottom:1px solid #c5cdf0;">
                        <p style="margin:0;font-size:10px;color:#767690;letter-spacing:0.12em;text-transform:uppercase;font-family:'Courier New',monospace;">
                            Récapitulatif de votre demande
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="padding:20px;">
                        <table width="100%" cellpadding="6" cellspacing="0">
                            <tr>
                                <td width="30%" style="font-size:11px;color:#767690;font-family:'Courier New',monospace;text-transform:uppercase;letter-spacing:0.08em;vertical-align:top;padding-bottom:10px;">Nom</td>
                                <td style="font-size:15px;color:#0e1322;font-weight:600;padding-bottom:10px;">{{ $data['name'] }}</td>
                            </tr>
                            @if(!empty($data['company']))
                            <tr>
                                <td style="font-size:11px;color:#767690;font-family:'Courier New',monospace;text-transform:uppercase;letter-spacing:0.08em;vertical-align:top;padding-bottom:10px;">Société</td>
                                <td style="font-size:15px;color:#0e1322;padding-bottom:10px;">{{ $data['company'] }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td style="font-size:11px;color:#767690;font-family:'Courier New',monospace;text-transform:uppercase;letter-spacing:0.08em;vertical-align:top;padding-bottom:10px;">Service</td>
                                <td style="padding-bottom:10px;">
                                    <span style="display:inline-block;background:#fff3eb;border:1px solid #e1721a;color:#c05800;font-size:12px;padding:3px 10px;font-family:'Courier New',monospace;">
                                        {{ $data['service_label'] }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size:11px;color:#767690;font-family:'Courier New',monospace;text-transform:uppercase;letter-spacing:0.08em;vertical-align:top;">Message</td>
                                <td style="font-size:14px;color:#44475a;line-height:1.6;white-space:pre-line;">{{ $data['message'] }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    {{-- ===== ÉTAPES SUIVANTES ===== --}}
    <tr>
        <td style="background-color:#ffffff;padding:0 40px 40px;">
            <table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f6ff;border-left:3px solid #e1721a;padding:20px;">
                <tr>
                    <td style="padding:20px;">
                        <p style="margin:0 0 12px;font-size:13px;font-weight:700;color:#0e1322;text-transform:uppercase;letter-spacing:0.05em;">
                            Prochaines étapes
                        </p>
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="padding:6px 0;font-size:14px;color:#44475a;vertical-align:top;">
                                    <span style="color:#e1721a;font-weight:700;margin-right:8px;">01</span>
                                    Notre équipe analyse votre demande
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:6px 0;font-size:14px;color:#44475a;vertical-align:top;">
                                    <span style="color:#e1721a;font-weight:700;margin-right:8px;">02</span>
                                    Un expert vous contacte dans les meilleurs délais
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:6px 0;font-size:14px;color:#44475a;vertical-align:top;">
                                    <span style="color:#e1721a;font-weight:700;margin-right:8px;">03</span>
                                    Nous construisons ensemble la solution adaptée
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    {{-- ===== CONTACT ===== --}}
    <tr>
        <td style="background-color:#ffffff;padding:0 40px 48px;">
            <p style="margin:0 0 8px;font-size:13px;color:#767690;">
                Une question urgente ? Contactez-nous directement :
            </p>
            <p style="margin:0;font-size:14px;">
                <a href="mailto:{{ config('oxmosys.company.email', 'contact@oxmosys.com') }}"
                   style="color:#1b3a8a;text-decoration:none;font-weight:600;">
                    {{ config('oxmosys.company.email', 'contact@oxmosys.com') }}
                </a>
                &nbsp;·&nbsp;
                <a href="tel:{{ config('oxmosys.company.phone', '') }}"
                   style="color:#1b3a8a;text-decoration:none;font-weight:600;">
                    {{ config('oxmosys.company.phone', '+253 21 35 XX XX') }}
                </a>
            </p>
        </td>
    </tr>

    {{-- ===== FOOTER ===== --}}
    <tr>
        <td style="background-color:#0e1322;padding:24px 40px;">
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <p style="margin:0 0 4px;font-size:14px;font-weight:800;color:#ffffff;">OXMOSYS-TECH</p>
                        <p style="margin:0;font-size:11px;color:#8e909d;line-height:1.5;">
                            {{ config('oxmosys.company.address_line1', 'Quartier du Héron') }},
                            {{ config('oxmosys.company.address_line2', 'Djibouti') }}
                        </p>
                    </td>
                    <td align="right" style="vertical-align:top;">
                        <p style="margin:0;font-size:11px;color:#444651;">
                            {{ config('oxmosys.company.copyright', '© 2024 OXMOSYS-TECH') }}
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

</table>
</td></tr>
</table>
</body>
</html>
