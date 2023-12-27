<!-- Tombol Edit -->

<div class="  mt-2 mb-2">
    <a href="{{ route('visitors.barcodeGenerate', $row->id) }}"
        class="text-white bg-gradient-to-r from-sky-500 via-sky-600 to-sky-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-sky-300 dark:focus:ring-sky-800 font-medium rounded-lg px-1 py-1 text-sm text-center ">
        Barcode
    </a>
</div>

<div class="  mt-2 mb-2">
    <a href="{{ route('visitors.edit', $row->id) }}"
        class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg px-1 py-1 text-sm text-center ">
        Edit
    </a>
</div>

<!-- Tombol Show -->
<a href="{{ route('visitors.show', $row->id) }}"
    class="text-white bg-gradient-to-r from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-1 py-1 mt-2 text-center mr-2 ">
    Show
</a>

@unless ($row->special_notes)
    <!-- Tombol Note -->
    <a href="{{ route('note.index', $row->id) }}"
        class="text-white bg-gradient-to-r from-yellow-500 via-yellow-600 to-yellow-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-yellow-800 font-medium rounded-lg text-sm px-1 py-1 mt-2 text-center mr-2 mb-2">
        Note
    </a>
@endunless


<!-- Tombol Delete (gunakan form untuk konfirmasi penghapusan) -->
<form action="{{ route('visitors.destroy', $row->id) }}" method="POST" class="inline">
    @csrf
    @method('DELETE')

    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
        class="text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-1 py-1 mt-2 text-center mr-2 mb-2">
        Delete
    </button>
</form>
