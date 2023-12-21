<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Tamu') }}
        </h2>
    </x-slot>

    <div class="container">
        <div
            class="card mx-auto max-w-3xl p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            {!! QrCode::size(256)->generate($visitor->no_visitors) !!}
        </div>
    </div>
</x-app-layout>
