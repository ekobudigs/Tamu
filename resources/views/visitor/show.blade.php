<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Tamu') }}
        </h2>
    </x-slot>

    <div class="container">
        <div
            class="card mx-auto max-w-3xl p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-6">
                    <label for="no_visitors"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Kode Tamu') }}</label>
                    <p>{{ $visitor->no_visitors }}</p>
                </div>

                <div class="mb-6">
                    <label for="guest_name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Nama Tamu') }}</label>
                    <p>{{ $visitor->guest_name }}</p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="mb-6">
                    <label for="phone_number"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('No Hp') }}</label>
                    <p>{{ $visitor->phone_number }}</p>
                </div>

                <div class="mb-6">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Email') }}</label>
                    <p>{{ $visitor->email }}</p>
                </div>
            </div>

            <div class="mb-6">
                <label for="address"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Alamat') }}</label>
                <p>{{ $visitor->address }}</p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="mb-6">
                    <label for="type"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Type') }}</label>
                    <p>{{ $visitor->type }}</p>
                </div>

                <div class="mb-6">
                    <label for="department_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Departemen') }}</label>
                    <p>{{ optional($visitor->department)->name }}</p>
                </div>
            </div>

            <div class="mb-6">
                <label for="office_institution_name"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Nama Kantor') }}</label>
                <p>{{ $visitor->office_institution_name }}</p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="mb-6">
                    <label for="number_of_people"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Jumlah Orang') }}</label>
                    <p>{{ $visitor->number_of_people }}</p>
                </div>

                <div class="mb-6">
                    <label for="purpose"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Tujuan/Alasan') }}</label>
                    <p>{{ $visitor->purpose }}</p>
                </div>
            </div>

            <div class="text-center mt-6">
                <a href="{{ route('visitors.edit', $visitor->id) }}"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">
                    Edit
                </a>

                <!-- Jika Anda tetap ingin menyertakan tombol edit, sesuaikan route dengan route edit Anda -->
                <!-- Tombol Edit -->
                {{-- <a href="{{ route('visitors.edit', $visitor->id) }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">
                    Edit
                </a> --}}
            </div>
        </div>
    </div>
</x-app-layout>
