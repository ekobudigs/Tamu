<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Tamu') }}
        </h2>
    </x-slot>

    <div class="container">
        <form method="POST" action="{{ route('visitors.store') }}">
            @csrf

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="w-full p-4">
                <div
                    class="card mx-auto max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                   

                        <div class="mb-6">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Kode Tamu') }}</label>
                            <input id="no_visitors" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="no_visitors" value=" {{ $newKode }}" required readonly autofocus>

                        </div>

                        <div class="mb-6">
                            <label for="guest_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Nama Tamu') }}</label>
                            <input id="guest_name" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('guest_name') is-invalid @enderror"
                                name="guest_name" value="{{ old('guest_name') }}" required autocomplete="guest_name">
                            @error('guest_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="phone_number"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('No Hp') }}</label>
                            <input id="phone_number" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('phone_number') is-invalid @enderror"
                                name="phone_number" value="{{ old('phone_number') }}" required
                                autocomplete="phone_number">
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Email') }}</label>
                            <input id="email" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="address"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Alamat') }}</label>
                            <textarea id="address"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('address') is-invalid @enderror"
                                name="address" required autocomplete="address">{{ old('address') }}</textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>




                     

                </div>
            </div>

            <div class="w-full p-4">
                <div
                    class="card mx-auto max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                

                       



                        <div class="mb-6">
                            <label for="type"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Type') }}</label>
                            <select id="type"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('type') is-invalid @enderror"
                                name="type" required autocomplete="type" autofocus>
                                <option value="guest" @if (old('type') === 'guest') selected @endif>
                                    {{ __('Pengunjung') }}</option>
                                <option value="visitor" @if (old('type') === 'visitor') selected @endif>
                                    {{ __('Tamu') }}</option>
                            </select>
                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="department_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Departments') }}</label>
                            <select id="department_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('department_id') is-invalid @enderror"
                                name="department_id" required autocomplete="department_id" autofocus>
                                @foreach ($departments as $id => $name)
                                    <option value="{{ $id }}"
                                        @if (old('department_id') === $id) selected @endif>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('department_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="mb-6">
                            <label for="office_institution_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Nama Kantor') }}</label>
                            <input id="office_institution_name" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('office_institution_name') is-invalid @enderror"
                                name="office_institution_name" value="{{ old('office_institution_name') }}" required
                                autocomplete="office_institution_name">
                            @error('office_institution_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="number_of_people"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Jumlah Orang') }}</label>
                            <input id="number_of_people" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('number_of_people') is-invalid @enderror"
                                name="number_of_people" value="{{ old('number_of_people') }}" required
                                autocomplete="number_of_people">
                            @error('number_of_people')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="purpose"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Tujuan/Alasan') }}</label>
                            <textarea id="purpose"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('purpose') is-invalid @enderror"
                                name="purpose" required autocomplete="purpose">{{ old('purpose') }}</textarea>
                            @error('purpose')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
