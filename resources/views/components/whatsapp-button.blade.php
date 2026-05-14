@php
    $whatsapp = config('oxmosys.company.whatsapp', '253 77 56 11 11');
    $number   = preg_replace('/[^0-9]/', '', $whatsapp); // 25377561111
    $message  = urlencode('Bonjour OXMOSYS-TECH, je souhaite obtenir des informations sur vos services.');
@endphp

{{-- WhatsApp floating button --}}
<a href="https://wa.me/{{ $number }}?text={{ $message }}"
   target="_blank"
   rel="noopener noreferrer"
   id="whatsapp-btn"
   aria-label="Contacter OXMOSYS-TECH sur WhatsApp"
   title="Discuter sur WhatsApp"
   class="fixed bottom-6 right-6 z-50 flex items-center justify-center
          w-14 h-14 rounded-full shadow-lg
          transition-transform duration-300 hover:scale-110 group"
   style="background-color: #25D366;">

    {{-- Pulse ring --}}
    <span class="absolute inset-0 rounded-full animate-ping opacity-30"
          style="background-color: #25D366;"></span>

    {{-- WhatsApp SVG icon --}}
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
         fill="white" class="w-7 h-7 relative z-10" aria-hidden="true">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
        <path d="M12 0C5.373 0 0 5.373 0 12c0 2.124.558 4.118 1.531 5.845L.057 23.928a.75.75 0 0 0 .93.865l6.345-1.485A11.945 11.945 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.75a9.695 9.695 0 0 1-4.962-1.365l-.356-.21-3.665.859.857-3.57-.232-.368A9.696 9.696 0 0 1 2.25 12C2.25 6.615 6.615 2.25 12 2.25S21.75 6.615 21.75 12 17.385 21.75 12 21.75z"/>
    </svg>

    {{-- Tooltip --}}
    <span class="absolute right-16 top-1/2 -translate-y-1/2 whitespace-nowrap
                 bg-surface-container-highest text-on-surface font-label-sm text-label-sm
                 px-3 py-1.5 rounded-md border border-primary-container
                 opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none">
        Discuter sur WhatsApp
    </span>
</a>
