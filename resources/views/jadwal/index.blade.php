@extends('template.template')

@section('title')
    <title>Jadwal</title>
@endsection

@section('content')
    <main class="p-4 lg:ml-64 h-auto pt-20">
        <div class="rounded-lg mb-4">
            <section class="bg-gray-50 dark:bg-gray-900">
                <div class="mx-auto max-w-screen-xl">
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
                        <h1 class="text-sm font-medium dark:text-white">Jadwal</h1>
                    </div>
                </div>
            </section>
        </div>

        <div class="rounded-lg mb-4">
            <section class="bg-gray-50 dark:bg-gray-900">
                <div class="mx-auto max-w-screen-xl">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 pb-4">
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            @if (Auth::user()->level == 'ADMIN' || Auth::user()->level == 'PETUGAS')
                                <a id="addProductButton" data-modal-target="addProductModal"
                                    data-modal-toggle="addProductModal" type="button"
                                    class="flex items-center justify-center text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:ring-sky-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-sky-600 dark:hover:bg-sky-700 focus:outline-none dark:focus:ring-sky-800 cursor-pointer">
                                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                    </svg>
                                    Tambah Jadwal
                                </a>
                                <button type="button" data-modal-target="deleteModal" data-modal-toggle="deleteModal"
                                    class="text-red-600 flex items-center justify-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                    <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Hapus Jadwal
                                </button>
                            @endif
                        </div>
                    </div>

                    <!-- component -->
                    <div class="lg:flex lg:h-full lg:flex-col bg-white relative shadow-md sm:rounded-lg overflow-hidden">
                        <header class="flex items-center justify-between border-b border-gray-200 px-6 py-4 lg:flex-none">
                            <h1 class="text-base font-semibold leading-6 text-gray-900" id="currentMonth">
                                {{ \Carbon\Carbon::parse(request('month', now()->format('Y-m')))->timezone('Asia/Jakarta')->format('F Y') }}
                            </h1>
                            <div class="flex items-center">
                                <div class="relative flex items-center rounded-md bg-white shadow-sm md:items-stretch">
                                    <button id="prevMonth" type="button"
                                        class="flex h-9 w-12 items-center justify-center rounded-l-md border-y border-l border-gray-300 pr-1 text-gray-400 hover:text-gray-500 focus:relative md:w-9 md:pr-0 md:hover:bg-gray-50">
                                        <span class="sr-only">Previous month</span>
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <span class="relative -mx-px h-5 w-px bg-gray-300 md:hidden"></span>
                                    <button id="nextMonth" type="button"
                                        class="flex h-9 w-12 items-center justify-center rounded-r-md border-y border-r border-gray-300 pl-1 text-gray-400 hover:text-gray-500 focus:relative md:w-9 md:pl-0 md:hover:bg-gray-50">
                                        <span class="sr-only">Next month</span>
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </header>
                        <div class="shadow ring-1 ring-black ring-opacity-5 lg:flex lg:flex-auto lg:flex-col">
                            <div
                                class="grid grid-cols-7 gap-px border-b border-gray-300 bg-gray-200 text-center text-xs font-semibold leading-6 text-gray-700 lg:flex-none">
                                @foreach (['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] as $day)
                                    <div class="flex justify-center bg-white py-2">
                                        <span class="not-sr-only">{{ $day }}</span>
                                    </div>
                                @endforeach
                            </div>
                            <div class="flex bg-gray-200 text-xs leading-6 text-gray-700 lg:flex-auto">
                                <div class="hidden w-full lg:grid lg:grid-cols-7 lg:grid-rows-6 lg:gap-px">
                                    @foreach ($dates as $date)
                                        <div
                                            class="relative px-3 py-2 {{ $date->month !== $startOfMonth->month ? 'bg-gray-50 text-gray-500' : 'bg-white' }}">
                                            <time datetime="{{ $date->toDateString() }}"
                                                class="{{ $date->isToday() ? 'flex h-6 w-6 items-center justify-center rounded-full bg-indigo-600 font-semibold text-white' : '' }}">
                                                {{ $date->format('j') }}
                                            </time>
                                            @php
                                                $eventsForDate = $jadwal->filter(function ($j) use ($date) {
                                                    return Carbon\Carbon::createFromFormat(
                                                        'd/m/Y',
                                                        $j->tanggal_kegiatan,
                                                    )->toDateString() == $date->toDateString();
                                                });
                                            @endphp
                                            @if ($eventsForDate->isNotEmpty())
                                                <ol class="mt-2">
                                                    @foreach ($eventsForDate as $event)
                                                        <li>
                                                            <a class="group flex">
                                                                <p
                                                                    class="flex-auto truncate font-medium text-gray-900 group-hover:text-indigo-600 whitespace-normal">
                                                                    {{ $event->kegiatan }}
                                                                </p>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ol>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                                <div class="isolate grid w-full grid-cols-7 grid-rows-6 gap-px lg:hidden">
                                    @foreach ($dates as $date)
                                        @php
                                            $eventsForDate = $jadwal->filter(function ($j) use ($date) {
                                                return Carbon\Carbon::createFromFormat(
                                                    'd/m/Y',
                                                    $j->tanggal_kegiatan,
                                                )->toDateString() == $date->toDateString();
                                            });
                                        @endphp
                                        @if ($eventsForDate->isNotEmpty())
                                            @foreach ($eventsForDate as $e)
                                                <button type="button" id="dropdownInformationButton{{ $e->id }}"
                                                    data-dropdown-toggle="dropdownInformation{{ $e->id }}"
                                                    class="flex h-14 flex-col {{ $date->month !== $startOfMonth->month ? 'bg-gray-50 text-gray-500' : 'bg-white text-gray-900' }} px-3 py-2 hover:bg-gray-100 focus:z-10 {{ $date->toDateString() === $today ? 'font-semibold text-indigo-600' : '' }}">
                                                    <time datetime="{{ $date->toDateString() }}"
                                                        class="ml-auto">{{ $date->format('j') }}</time>
                                                    <span class="-mx-0.5 mt-auto flex flex-wrap-reverse">
                                                        <span
                                                            class="mx-0.5 mb-1 h-1.5 w-1.5 rounded-full bg-gray-400"></span>
                                                    </span>
                                                </button>
                                            @endforeach
                                        @else
                                            <button type="button"
                                                class="flex h-14 flex-col {{ $date->month !== $startOfMonth->month ? 'bg-gray-50 text-gray-500' : 'bg-white text-gray-900' }} px-3 py-2 hover:bg-gray-100 focus:z-10 {{ $date->toDateString() === $today ? 'font-semibold text-indigo-600' : '' }}">
                                                <time datetime="{{ $date->toDateString() }}"
                                                    class="ml-auto">{{ $date->format('j') }}</time>
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Dropdown menu -->
    @foreach ($jadwal as $j)
        <div id="dropdownInformation{{ $j->id }}"
            class="z-10 hidden bg-white divide-y divide-gray-200 rounded-lg shadow w-44">
            <div class="px-4 py-3 text-sm text-gray-900">
                <div class="font-medium truncate whitespace-normal">{{ $j->kegiatan }}</div>
            </div>
        </div>
    @endforeach

    <!-- Main modal -->
    <div id="addProductModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full">
        <div class="relative p-4 w-full max-w-lg h-5/6">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Tambah Jadwal Baru
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="addProductModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="{{ url('/jadwal/prosesTambah') }}" method="POST">
                    @csrf
                    <div class="grid gap-4 mb-4">
                        <div>
                            <label for="tanggal_kegiatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Kegiatan</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input datepicker datepicker-autohide datepicker-buttons datepicker-autoselect-today
                                    datepicker-format="dd/mm/yyyy" type="text" name="tanggal_kegiatan"
                                    id="tanggal_kegiatan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="DD/MM/YYYY" required="">
                            </div>
                        </div>
                        <div>
                            <label for="kegiatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kegiatan</label>
                            <input type="text" name="kegiatan" id="kegiatan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                                placeholder="Kegiatan" required="">
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="submit"
                            class="text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">
                            Tambah Jadwal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Main modal -->
    <div id="deleteModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full">
        <div class="relative p-4 w-full max-w-lg h-5/6">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Hapus Jadwal
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="deleteModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form id="confirmDeleteForm" method="POST">
                    @csrf @method('delete')
                    <div class="grid gap-4 mb-4">
                        <div>
                            <label for="tanggal_kegiatan_hapus"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Kegiatan</label>
                            <select id="tanggal_kegiatan_hapus" name="tanggal_kegiatan_hapus"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" selected>Pilih</option>
                                @foreach ($jadwal as $j)
                                    <option value="{{ $j->tanggal_kegiatan }}">{{ $j->tanggal_kegiatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="kegiatan_hapus"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kegiatan</label>
                            <input type="text" name="kegiatan_hapus" id="kegiatan_hapus"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500 cursor-not-allowed"
                                placeholder="Kegiatan" required="" disabled>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="submit"
                            class="py-2.5 px-5 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                            Hapus Jadwal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('tanggal_kegiatan_hapus').addEventListener('change', function() {
                var tanggal_kegiatan = this.value;
                if (tanggal_kegiatan) {
                    fetch(`/jadwal/getJadwalByTanggal/?tanggal=${tanggal_kegiatan}`)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('kegiatan_hapus').value = data.kegiatan;
                            document.getElementById('confirmDeleteForm').action =
                                `/jadwal/hapus/?tanggal=${tanggal_kegiatan}`;
                        });
                } else {
                    document.getElementById('kegiatan_hapus').value = '';
                    document.getElementById('confirmDeleteForm').action = '';
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const prevButton = document.getElementById('prevMonth');
            const nextButton = document.getElementById('nextMonth');
            const currentMonthElement = document.getElementById('currentMonth');
            let currentMonth = new Date(currentMonthElement.textContent.trim() + ' 01');

            function updateMonth(delta) {
                currentMonth.setMonth(currentMonth.getMonth() + delta);
                const year = currentMonth.getFullYear();
                const month = String(currentMonth.getMonth() + 1).padStart(2, '0');
                const monthYear = currentMonth.toLocaleString('default', {
                    month: 'long',
                    year: 'numeric'
                });

                window.location.search = `?month=${year}-${month}`;
            }

            prevButton.addEventListener('click', () => updateMonth(-1));
            nextButton.addEventListener('click', () => updateMonth(1));
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('[data-dropdown-toggle]');

            buttons.forEach(button => {
                const dropdownId = button.getAttribute('data-dropdown-toggle');
                const dropdown = document.getElementById(dropdownId);

                button.addEventListener('click', function() {
                    dropdown.classList.toggle('hidden');
                });
            });

            // Optional: Click outside to close the dropdown
            document.addEventListener('click', function(event) {
                buttons.forEach(button => {
                    const dropdownId = button.getAttribute('data-dropdown-toggle');
                    const dropdown = document.getElementById(dropdownId);

                    if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                        dropdown.classList.add('hidden');
                    }
                });
            });
        });
    </script>
@endsection
