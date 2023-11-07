<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mt-6 ml-3">
                    <a href="{{route('visitors.create')}}"
                    class="mt-6 text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Create</a>
                </div>
             
                <div class="p-6 text-gray-900">
                    
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        {!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered table-mini']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
        <script>
            $(document).ready(function() {

            });
        </script>
    @endpush
</x-app-layout>
