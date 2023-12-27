<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Scan Qr Tamu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <!-- Modal toggle -->
                    <button data-modal-target="default-modal" id="startButton" data-modal-toggle="default-modal"
                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                      Scan
                    </button>

                    <!-- Main modal -->
                    <div id="default-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                       Silahkan Untuk Scan Barcode Tamu
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="default-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5 space-y-4">
                                    <div id="reader" width="600px"></div>
                                    <input type="text" id="resultInput"
                                        placeholder="Hasil QR Code akan muncul di sini" />

                                        <div id="visitorInfo">

                                        </div>
                                </div>
                                <!-- Modal footer -->
                                <div
                                    class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <button data-modal-hide="default-modal" type="button"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                        accept</button>
                                    <button data-modal-hide="default-modal" type="button"
                                        class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        let html5QrcodeScanner = null;

        function onScanSuccess(decodedText, decodedResult) {
            console.log(`Code matched = ${decodedText}`, decodedResult);
            const inputElement = document.getElementById("resultInput");
            if (inputElement) {
                inputElement.value = decodedText;
            }
            // Handle the scanned code as you like

             // Kirim permintaan Ajax
             $.ajax({
                url: "{{ route('getVisitor') }}",
                type: 'GET',
                data: { no_visitors: decodedText },
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        // Pengunjung berhasil ditemukan
                        console.log(response.visitor);
                        // Tambahkan logika atau manipulasi DOM lainnya di sini
                        displayVisitorInfo(response.visitor);
                    } else {
                        // Pengunjung tidak ditemukan
                        console.log(response.message);
                        displayNotFoundMessage();
                        // Tambahkan logika atau manipulasi DOM lainnya di sini
                    }
                },
                error: function (xhr, status, error) {
                    // console.error('Error:', error);
                    // Tambahkan logika atau manipulasi DOM lainnya di sini
                }
            });
       

        }

        function displayVisitorInfo(visitor) {
    // Ambil elemen div untuk menampilkan informasi pengunjung
    const infoDiv = document.getElementById("visitorInfo");

    // Buat HTML untuk menampilkan informasi pengunjung
    const html = `
        <div>
            <p><strong>Guest Name:</strong> ${visitor.guest_name}</p>
            <p><strong>Address:</strong> ${visitor.address}</p>
            <p><strong>Phone Number:</strong> ${visitor.phone_number}</p>
            <p><strong>Email:</strong> ${visitor.email}</p>
            <p><strong>Check-in Time:</strong> ${visitor.check_in_time}</p>
            <p><strong>Type:</strong> ${visitor.type}</p>
            <p><strong>Office/Institution Name:</strong> ${visitor.office_institution_name}</p>
            <p><strong>Purpose:</strong> ${visitor.purpose}</p>
        </div>
    `;

    // Tampilkan informasi pengunjung dalam div
    infoDiv.innerHTML = html;
}

function displayNotFoundMessage() {
    // Ambil elemen div untuk menampilkan pesan tidak ditemukan
    const infoDiv = document.getElementById("visitorInfo");

    // Buat HTML untuk menampilkan pesan tidak ditemukan
    const html = `
        <div>
            <p>Data tamu tidak ada di sistem. Silahkan laporkan ke admin.</p>
        </div>
    `;

    // Tampilkan pesan dalam div
    infoDiv.innerHTML = html;
}

        function onScanFailure(error) {
            // console.warn(`Code scan error = ${error}`);
            // Handle scan failure
        }

        // Fungsi untuk memulai pemindaian
        const startScanner = () => {
            if (!html5QrcodeScanner) {
                html5QrcodeScanner = new Html5QrcodeScanner(
                    "reader", {
                        fps: 10,
                        qrbox: {
                            width: 250,
                            height: 250
                        },
                        delay: 0
                    },
                    false
                );
                html5QrcodeScanner.render(onScanSuccess, onScanFailure);
            }
        };

        const stopScanner = () => {
            if (html5QrcodeScanner) {
                html5QrcodeScanner.clear();
                if (typeof html5QrcodeScanner.stop === 'function') {
                    html5QrcodeScanner.stop();
                }
                html5QrcodeScanner = null;
            }
        };

        const startButton = document.getElementById("startButton");
        startButton.addEventListener("click", startScanner);

        const closeButton = document.querySelector('[data-modal-hide="default-modal"]');
        closeButton.addEventListener("click", stopScanner);
    </script>
</x-app-layout>
