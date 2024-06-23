@extends('template.template')

@section('title')
    <title>Status Gizi | SAW</title>
@endsection

@section('content')
    <main class="p-4 lg:ml-64 h-auto pt-20">
        <div class="rounded-lg mb-4">
            <section class="bg-gray-50 dark:bg-gray-900">
                <div class="mx-auto max-w-screen-xl">
                    <div
                        class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden py-2 px-4 flex items-center justify-between">
                        <h1 class="text-sm font-medium dark:text-white">Status Gizi / SAW</h1>
                        <a href="{{ url('/statusgizi') }}"
                            class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg aria-hidden="true"
                                class="w-4 h-4 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                            </svg>
                            <span class="text-sm font-medium ml-3">Kembali</span>
                        </a>
                    </div>
                </div>
            </section>
        </div>

        <div class="rounded-lg mb-4">
            <section class="bg-gray-50 dark:bg-gray-900">
                <div class="mx-auto max-w-screen-xl">
                    <!-- Start coding here -->
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Matriks Keputusan Awal</h2>
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                        <div
                            class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">Nama</th>
                                        <th scope="col" class="px-4 py-3">Berat Badan (kg)</th>
                                        <th scope="col" class="px-4 py-3">Tinggi Badan (cm)</th>
                                        <th scope="col" class="px-4 py-3">Umur (bulan)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($matrixKeputusan as $mk)
                                        <tr class="border-b dark:border-gray-700">
                                            <td class="px-4 py-3">{{ $mk['nama'] }}</td>
                                            <td class="px-4 py-3">{{ $mk['berat_badan'] }}</td>
                                            <td class="px-4 py-3">{{ $mk['tinggi_badan'] }}</td>
                                            <td class="px-4 py-3">{{ $mk['umur'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h2 class="mb-4 mt-4 text-xl font-bold text-gray-900 dark:text-white">Matriks Normalisasi</h2>
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                        <div
                            class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">Nama</th>
                                        <th scope="col" class="px-4 py-3">Berat Badan (kg)</th>
                                        <th scope="col" class="px-4 py-3">Tinggi Badan (cm)</th>
                                        <th scope="col" class="px-4 py-3">Umur (bulan)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($matrixNormalisasi as $id => $kriteria)
                                        <tr class="border-b dark:border-gray-700">
                                            <td class="px-4 py-3">
                                                {{ \App\Models\Pertumbuhan::join('penduduks', 'pertumbuhans.nik', '=', 'penduduks.nik')->find($id)->nama }}
                                            </td>
                                            @foreach ($kriteria as $value)
                                                <td class="px-4 py-3">{{ number_format($value, 2) }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h2 class="mb-4 mt-4 text-xl font-bold text-gray-900 dark:text-white">Matriks Ternormalisasi Terbobot
                    </h2>
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                        <div
                            class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">Nama</th>
                                        <th scope="col" class="px-4 py-3">Berat Badan (kg)</th>
                                        <th scope="col" class="px-4 py-3">Tinggi Badan (cm)</th>
                                        <th scope="col" class="px-4 py-3">Umur (bulan)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($matrixTerbobot as $id => $kriteria)
                                        <tr class="border-b dark:border-gray-700">
                                            <td class="px-4 py-3">
                                                {{ \App\Models\Pertumbuhan::join('penduduks', 'pertumbuhans.nik', '=', 'penduduks.nik')->find($id)->nama }}
                                            </td>
                                            @foreach ($kriteria as $value)
                                                <td class="px-4 py-3">{{ number_format($value, 2) }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h2 class="mb-4 mt-4 text-xl font-bold text-gray-900 dark:text-white">Hasil</h2>
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                        <div
                            class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">Nama</th>
                                        <th scope="col" class="px-4 py-3">Nilai Preferensi</th>
                                        <th scope="col" class="px-4 py-3">Ranking</th>
                                        {{-- <th scope="col" class="px-4 py-3">Status</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hasil as $id => $data)
                                        <tr class="border-b dark:border-gray-700">
                                            <td class="px-4 py-3">{{ $data['nama'] }}</td>
                                            <td class="px-4 py-3">{{ number_format($data['nilai_preferensi'], 2) }}</td>
                                            <td class="px-4 py-3">{{ $loop->index + 1 }}</td>
                                            {{-- <td class="px-4 py-3">
                                                @if ($data['status'] == 'Gizi Baik')
                                                    <span
                                                        class="bg-green-100 text-green-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                                        {{ $data['status'] }}
                                                    </span>
                                                @elseif ($data['status'] == 'Gizi Sedang')
                                                    <span
                                                        class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                                        {{ $data['status'] }}
                                                    </span>
                                                @else
                                                    <span
                                                        class="bg-red-100 text-red-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                                        {{ $data['status'] }}
                                                    </span>
                                                @endif
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
@endsection
