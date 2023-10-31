<x-button.dropdown>
    @foreach ($data['action'] as $action)
        @if ($action['type'] == 'delete')
            <a href="javascript:;" onclick="hapus(`{{ $action['route'] }}`)"
                class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i
                    class="{{ $action['icon'] }}"></i> {{ $action['title'] }}</a>
        @else
            <a href="{{ $action['route'] }}"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                @if (isset($action['modal'])) data-bs-toggle="modal"
    data-bs-target="#{{ $action['modal'] }}"
    @foreach ($action['dataModal'] as $dataModal)
    data-{{ $dataModal['name'] }}="{{ $dataModal['value'] }}"
    @endforeach @endif><i
                    class="{{ $action['icon'] }}"></i> {{ $action['title'] }}</a>
        @endif
    @endforeach
</x-button.dropdown>
