<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Tamu') }}
        </h2>
    </x-slot>
    <div class="container mx-auto">
       
        <div class="card max-w-3xl p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
           
            <h1 class="text-lg font-semibold dark:text-white">Tunjukan Kepada Satpam dan Repsionise</h1>

       
            <div class="mb-5">
                {{-- Misalkan $visitor adalah objek yang menyimpan data pengunjung --}}
                @if(!$visitor->receptionist_id && !$visitor->security_guard_id)
                <span class="bg-pink-100 text-pink-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300 mb-5">
                    Silahkan anda scan barcode ini ke pada Satpam dan Recepcionis
                </span>
                @elseif (!$visitor->receptionist_id)
                <span class="bg-pink-100 text-pink-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300 mb-5">
                    Silahkan anda scan barcode ini ke pada Recepcionis
                </span>
                @elseif (!$visitor->security_guard_id)
                <span class="bg-pink-100 text-pink-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300 mb-5">
                    Silahkan anda scan barcode ini ke pada Satpam
                </span>
                @else
                    <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300 mb-5">
                      Anda Sudah Melakukan Scan Barcode
                    </span>
                @endif
              </div>
            {!! QrCode::size(256)->generate($visitor->no_visitors) !!}
        </div>
    </div>
    
</x-app-layout>
