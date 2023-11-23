<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Note Tamu') }} {{ $visitor->guest_name}}
        </h2>
    </x-slot>

    {{-- {!! QrCode::size(200)->generate( $newKode) !!} --}}
    <div class="container">
        <form method="POST" action="{{ route('visitors.store') }}">
            @csrf

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">


            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="w-full p-4">
                    <div
                        class="card mx-auto max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                        <input type="hidden" id="id" name="{{ $visitor->id }}" value="{{ $visitor->id }}" >

                        <div class="mb-6">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Note  Tamu') }}</label>
                            <input id="no_visitors" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="no_visitors" required  autofocus>

                        </div>

                       
                        <div class="text-center mt-6 mb-6">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit"
                                    class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Simpan</button>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
            
        </form>
    </div>
    </div>
</x-app-layout>
