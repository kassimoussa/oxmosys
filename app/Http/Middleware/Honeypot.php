<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class Honeypot
{
    // Délai minimum en secondes entre l'affichage du formulaire et sa soumission.
    // Un bot soumet en < 1 s. Un humain réel prend au moins 4-5 s.
    private const MIN_SECONDS = 4;

    public function handle(Request $request, Closure $next): Response
    {
        // ── 1. Champ piège (honeypot) ────────────────────────────────────────
        // Le champ _hp est caché visuellement. Les humains ne le remplissent
        // jamais. Les bots qui balayent tous les champs du DOM le remplissent.
        if ($request->filled('_hp')) {
            Log::info('Honeypot déclenché', ['ip' => $request->ip()]);
            return $this->silentFail($request);
        }

        // ── 2. Token temporel ─────────────────────────────────────────────────
        // Le formulaire intègre un timestamp chiffré au moment du rendu.
        // On refuse toute soumission intervenue trop vite (bot) ou avec un
        // token invalide / forgé (attaque directe sur l'endpoint POST).
        $raw = $request->input('_ts');

        if (!$raw) {
            return $this->silentFail($request);
        }

        try {
            $loadedAt = (int) decrypt($raw);
        } catch (\Throwable) {
            // Token forgé ou expiré (clé APP_KEY changée)
            Log::warning('Token formulaire invalide', ['ip' => $request->ip()]);
            return $this->silentFail($request);
        }

        if ((time() - $loadedAt) < self::MIN_SECONDS) {
            Log::info('Soumission trop rapide (bot probable)', [
                'ip'      => $request->ip(),
                'elapsed' => time() - $loadedAt,
            ]);
            return $this->silentFail($request);
        }

        return $next($request);
    }

    // Échec silencieux : on prétend que tout s'est bien passé.
    // Le bot n'a aucun retour qui lui permettrait d'adapter sa stratégie.
    private function silentFail(Request $request): Response
    {
        $msg = str_contains($request->path(), 'devis')
            ? 'Votre demande de devis a bien été reçue. Un expert vous contactera sous 24 h ouvrées.'
            : 'Votre message a bien été envoyé. Notre équipe vous contactera dans les plus brefs délais.';

        return redirect()->back()->with('success', $msg);
    }
}
