<!-- Tombol Edit -->
<a href="{{ route('visitors.edit', $row->id) }}"
    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
    Edit
</a>

<!-- Tombol Show -->
<a href="{{ route('visitors.show', $row->id) }}"
    class="text-white bg-gradient-to-r from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
    Show
</a>

<!-- Tombol Delete (gunakan form untuk konfirmasi penghapusan) -->
<form action="{{ route('visitors.destroy', $row->id) }}" method="POST" class="inline">
    @csrf
    @method('DELETE')

    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
        class="text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
        Delete
    </button>
</form>
