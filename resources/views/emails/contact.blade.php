<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nouveau message — {{ $data['name'] }}</title>
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
                            Nouveau message via le site
                        </p>
                    </td>
                    <td align="right">
                        <span style="display:inline-block;background:#1b3a8a;color:#dee1f7;font-size:10px;font-family:'Courier New',monospace;letter-spacing:0.1em;text-transform:uppercase;padding:6px 12px;">
                            Contact
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
                Un visiteur a soumis le formulaire de contact. Voici les détails du message.
            </p>

            {{-- Info block --}}
            <table width="100%" cellpadding="0" cellspacing="0"
                   style="border:1px solid #c5cdf0;margin-bottom:24px;">
                <tr>
                    <td style="background:#eef0fb;padding:10px 16px;border-bottom:1px solid #c5cdf0;">
                        <p style="margin:0;font-size:10px;color:#767690;letter-spacing:0.1em;text-transform:uppercase;font-family:'Courier New',monospace;">
                            Expéditeur
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="padding:16px;">
                        <table width="100%" cellpadding="6" cellspacing="0">
                            <tr>
                                <td width="35%" style="font-size:11px;color:#767690;font-family:'Courier New',monospace;text-transform:uppercase;letter-spacing:0.08em;vertical-align:top;">Nom</td>
                                <td style="font-size:15px;color:#181c2e;font-weight:600;">{{ $data['name'] }}</td>
                            </tr>
                            @if(!empty($data['company']))
                            <tr>
                                <td style="font-size:11px;color:#767690;font-family:'Courier New',monospace;text-transform:uppercase;letter-spacing:0.08em;vertical-align:top;">Société</td>
                                <td style="font-size:15px;color:#181c2e;">{{ $data['company'] }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td style="font-size:11px;color:#767690;font-family:'Courier New',monospace;text-transform:uppercase;letter-spacing:0.08em;vertical-align:top;">E-mail</td>
                                <td style="font-size:15px;color:#1b3a8a;">
                                    <a href="mailto:{{ $data['email'] }}" style="color:#1b3a8a;text-decoration:none;">{{ $data['email'] }}</a>
                                </td>
                            </tr>
                            @if(!empty($data['phone']))
                            <tr>
                                <td style="font-size:11px;color:#767690;font-family:'Courier New',monospace;text-transform:uppercase;letter-spacing:0.08em;vertical-align:top;">Téléphone</td>
                                <td style="font-size:15px;color:#181c2e;">{{ $data['phone'] }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td style="font-size:11px;color:#767690;font-family:'Courier New',monospace;text-transform:uppercase;letter-spacing:0.08em;vertical-align:top;">Service</td>
                                <td>
                                    <span style="display:inline-block;background:#e8eaf5;border:1px solid #c5cdf0;color:#1b3a8a;font-size:12px;font-family:'Courier New',monospace;padding:3px 10px;">
                                        {{ $data['service_label'] }}
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            {{-- Message --}}
            <table width="100%" cellpadding="0" cellspacing="0"
                   style="border:1px solid #c5cdf0;margin-bottom:32px;">
                <tr>
                    <td style="background:#eef0fb;padding:10px 16px;border-bottom:1px solid #c5cdf0;">
                        <p style="margin:0;font-size:10px;color:#767690;letter-spacing:0.1em;text-transform:uppercase;font-family:'Courier New',monospace;">
                            Message
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="padding:20px 16px;font-size:15px;color:#181c2e;line-height:1.7;white-space:pre-line;">{{ $data['message'] }}</td>
                </tr>
            </table>

            {{-- CTA --}}
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <td style="background:#e1721a;padding:14px 28px;">
                        <a href="mailto:{{ $data['email'] }}" style="color:#ffffff;font-size:12px;font-family:'Courier New',monospace;letter-spacing:0.1em;text-transform:uppercase;text-decoration:none;font-weight:600;">
                            Répondre à {{ $data['name'] }}
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
                Ce message a été envoyé depuis le formulaire de contact de
                <strong style="color:#1b3a8a;">oxmosys-tech.dj</strong>
                le {{ now()->format('d/m/Y à H:i') }}.
            </p>
        </td>
    </tr>

</table>
</td></tr>
</table>
</body>
</html>
