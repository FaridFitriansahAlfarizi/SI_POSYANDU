@extends('template.template')

@section('title')
    <title>Status Gizi</title>
@endsection

@section('content')
    <main class="p-4 lg:ml-64 h-auto pt-20">
        <div class="rounded-lg mb-4">
            <section class="bg-gray-50 dark:bg-gray-900">
                <div class="mx-auto max-w-screen-xl">
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
                        <h1 class="text-sm font-medium dark:text-white">Status Gizi</h1>
                    </div>
                </div>
            </section>
        </div>

        <div class="rounded-lg mb-4">
            <section class="bg-gray-50 dark:bg-gray-900">
                <div class="mx-auto max-w-screen-xl">
                    <!-- Start coding here -->
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                        <div
                            class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                            <div class="w-full md:w-1/2">
                                <form class="flex items-center">
                                    <label for="simple-search" class="sr-only">Search</label>
                                    <div class="relative w-full">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <input type="text" id="searchInput"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                                            placeholder="Cari" required="">
                                    </div>
                                </form>
                            </div>
                            @if (Auth::user()->level == 'ADMIN' || Auth::user()->level == 'PETUGAS')
                                <div
                                    class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                    <a href="{{ url('/statusgizi/updateData') }}" type="button"
                                        class="flex items-center justify-center text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                                        Update Data
                                    </a>
                                    <a href="{{ url('/statusgizi/saw') }}" type="button"
                                        class="flex items-center justify-center text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:ring-sky-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-sky-600 dark:hover:bg-sky-700 focus:outline-none dark:focus:ring-sky-800">
                                        SAW
                                    </a>
                                    <a href="{{ url('/statusgizi/moora') }}" type="button"
                                        class="flex items-center justify-center text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:ring-sky-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-sky-600 dark:hover:bg-sky-700 focus:outline-none dark:focus:ring-sky-800">
                                        MOORA
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="overflow-x-auto">
                            <table id="dataTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">Nama Lengkap</th>
                                        <th scope="col" class="px-4 py-3">NIK</th>
                                        <th scope="col" class="px-4 py-3">Berat Badan (kg)</th>
                                        <th scope="col" class="px-4 py-3">Tinggi Badan (cm)</th>
                                        <th scope="col" class="px-4 py-3">Umur (bulan)</th>
                                        <th scope="col" class="px-4 py-3">Ranking</th>
                                        {{-- <th scope="col" class="px-4 py-3">Status</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($statusgizi as $sg)
                                        <tr class="border-b dark:border-gray-700">
                                            <td scope="row"
                                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $sg->nama_anak }}</td>
                                            <td class="px-4 py-3">{{ $sg->nik }}</td>
                                            <td class="px-4 py-3">{{ $sg->berat_badan }}</td>
                                            <td class="px-4 py-3">{{ $sg->tinggi_badan }}</td>
                                            <td class="px-4 py-3">{{ $sg->umur }}</td>
                                            <td class="px-4 py-3">{{ $sg->ranking }}</td>
                                            {{-- <td class="px-4 py-3">
                                                @if ($sg->status == 'Gizi Baik')
                                                    <span
                                                        class="bg-green-100 text-green-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                                        {{ $sg->status }}
                                                    </span>
                                                @elseif ($sg->status == 'Gizi Sedang')
                                                    <span
                                                        class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                                        {{ $sg->status }}
                                                    </span>
                                                @else
                                                    <span
                                                        class="bg-red-100 text-red-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                                        {{ $sg->status }}
                                                    </span>
                                                @endif
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $statusgizi->links('vendor.pagination.tailwind') }}
                    </div>
                </div>
            </section>
        </div>
    </main>

    <div id="deleteModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full">
        <div class="relative p-4 w-full max-w-md h-auto">
            <!-- Modal content -->
            <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <button type="button"
                    class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="deleteModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true"
                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
                <p class="mb-4 text-gray-500 dark:text-gray-300">Apakah Anda yakin ingin menghapus data ini?</p>
                <div class="flex justify-center items-center space-x-4">
                    <button data-modal-toggle="deleteModal" type="button"
                        class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Tidak, batalkan
                    </button>
                    <form id="confirmDeleteForm" method="POST">
                        @csrf @method('delete')
                        <button type="submit"
                            class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                            Ya, saya yakin
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('[data-modal-toggle="deleteModal"]').forEach(link => {
            link.addEventListener('click', (event) => {
                event.preventDefault();
                const id = link.getAttribute('data-id');

                const confirmDeleteForm = document.getElementById('confirmDeleteForm');
                confirmDeleteForm.action = `/admin/pertumbuhan/hapus/${id}`;
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById('searchInput');
            const table = document.getElementById('dataTable');
            const rows = table.getElementsByTagName('tr');

            // Function to perform search
            function performSearch() {
                const searchText = searchInput.value.toLowerCase();
                for (let i = 1; i < rows.length; i++) { // Start from index 1 to skip the header row
                    const row = rows[i];
                    const cells = row.getElementsByTagName('td');
                    let found = false;
                    for (let cell of cells) {
                        const cellText = cell.textContent || cell.innerText;
                        if (cellText.toLowerCase().indexOf(searchText) > -1) {
                            found = true;
                            break;
                        }
                    }
                    if (found) {
                        row.style.display = "";
                    } else {
                        row.style.display = "none";
                    }
                }
            }

            // Event listener for input changes
            searchInput.addEventListener('input', performSearch);
        });
    </script>
@endsection
