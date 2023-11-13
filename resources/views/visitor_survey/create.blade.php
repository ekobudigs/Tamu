<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Tamu') }}
        </h2>
    </x-slot>

    {{-- {!! QrCode::size(200)->generate( $newKode) !!} --}}
    <div class="container">
        <form method="POST" action="{{ route('visitors.store') }}">
            @csrf

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="visitor_id" value="{{ $visitor->id }}">


            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="w-full p-4">
                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                        <div class="w-full p-4">
                            <div class="mb-6">
                                <label for="survey_answer"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Survey Answer') }}</label>
                                <textarea id="survey_answer"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="survey_answer" required autofocus></textarea>
                            </div>
                        </div>
                        <div class="w-full p-4">
                            <div class="mb-6">
                                <label for="survey_scale"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Survey Scale') }}</label>
                                <div class="flex flex-wrap justify-between">
                                    @for ($i = 1; $i <= 10; $i++)
                                        <div class="w-1/5">
                                            <label for="survey_scale_{{ $i }}"
                                                class="block text-sm font-medium text-gray-700 dark:text-white">{{ $i }}</label>
                                            <input id="survey_scale_{{ $i }}" type="radio"
                                                name="survey_scale" value="{{ $i }}"
                                                class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="text-center mt-6 mb-6">
                <div class="col-md-6 offset-md-4">
                    <button type="submit"
                        class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Simpan</button>
                </div>
            </div>
        </form>
    </div>
    </div>
</x-app-layout>
