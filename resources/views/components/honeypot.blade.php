{{--
    Protection anti-spam — NE PAS SUPPRIMER.
    1. Champ piège (_hp)   : invisible aux humains, rempli par les bots → rejet
    2. Token temporel (_ts): timestamp chiffré → soumission trop rapide = rejet
--}}

{{-- Champ piège : positionné hors écran, jamais rempli par un humain --}}
<div style="position:absolute;left:-9999px;top:-9999px;height:0;width:0;overflow:hidden;"
     aria-hidden="true">
    <label for="_hp">Ne pas remplir</label>
    <input type="text"
           name="_hp"
           id="_hp"
           value=""
           autocomplete="off"
           tabindex="-1">
</div>

{{-- Token temporel chiffré --}}
<input type="hidden" name="_ts" value="{{ encrypt(time()) }}">
