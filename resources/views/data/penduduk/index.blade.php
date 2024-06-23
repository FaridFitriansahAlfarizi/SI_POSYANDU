@extends('template.template')

@section('title')
    <title>Penduduk</title>
@endsection

@section('content')
    <main class="p-4 lg:ml-64 h-auto pt-20">
        <div class="rounded-lg mb-4">
            <section class="bg-gray-50 dark:bg-gray-900">
                <div class="mx-auto max-w-screen-xl">
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
                        <h1 class="text-sm font-medium dark:text-white">Data / Penduduk</h1>
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
                            <div
                                class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                <a href="{{ url('/data/penduduk/tambah') }}" type="button"
                                    class="flex items-center justify-center text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:ring-sky-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-sky-600 dark:hover:bg-sky-700 focus:outline-none dark:focus:ring-sky-800">
                                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                    </svg>
                                    Tambah Penduduk
                                </a>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table id="dataTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">Nama Lengkap</th>
                                        <th scope="col" class="px-4 py-3">NIK</th>
                                        <th scope="col" class="px-4 py-3">Jenis Kelamin</th>
                                        <th scope="col" class="px-4 py-3">Tempat Lahir</th>
                                        <th scope="col" class="px-4 py-3">Tanggal Lahir</th>
                                        <th scope="col" class="px-4 py-3">
                                            <span class="sr-only">Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penduduks as $penduduk)
                                        <tr class="border-b dark:border-gray-700">
                                            <td scope="row"
                                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $penduduk->nama }}</td>
                                            <td class="px-4 py-3">{{ $penduduk->nik }}</td>
                                            <td class="px-4 py-3">{{ $penduduk->jenis_kelamin }}</td>
                                            <td class="px-4 py-3">{{ $penduduk->tempat_lahir }}</td>
                                            <td class="px-4 py-3 format-tanggal">{{ $penduduk->tanggal_lahir }}</td>
                                            <td class="px-4 py-3 flex items-center justify-end">
                                                <button id="apple-imac-27-dropdown-button"
                                                    data-dropdown-toggle="{{ $penduduk->nik }}"
                                                    class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                                    type="button">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    </svg>
                                                </button>
                                                <div id="{{ $penduduk->nik }}"
                                                    class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                        aria-labelledby="apple-imac-27-dropdown-button">
                                                        <li>
                                                            <a href="{{ url('/data/penduduk/detail/' . $penduduk->nik) }}"
                                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Detail</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ url('/data/penduduk/ubah/' . $penduduk->nik) }}"
                                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ubah</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $penduduks->links('vendor.pagination.tailwind') }}
                    </div>
                </div>
            </section>
        </div>
    </main>

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
