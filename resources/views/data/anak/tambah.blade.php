@extends('template.template')

@section('title')
    <title>Anak | Tambah</title>
@endsection

@section('content')
    <main class="p-4 lg:ml-64 h-auto pt-20">
        <div class="rounded-lg mb-4">
            <section class="bg-gray-50 dark:bg-gray-900">
                <div class="mx-auto max-w-screen-xl">
                    <div
                        class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden py-2 px-4 flex items-center justify-between">
                        <h1 class="text-sm font-medium dark:text-white">Data / Anak / Tambah</h1>
                        <a href="{{ url('/data/anak') }}"
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
                    <div class="relative overflow-hidden">
                        <div class="flex items-center p-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>Form ini hanya digunakan untuk menginputkan data anak yang orang tuanya sudah terdaftar
                                pada sistem.</div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="rounded-lg mb-4">
            <section class="bg-gray-50 dark:bg-gray-900">
                <div class="mx-auto max-w-screen-xl">
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Data Orang Tua</h2>
                        <form action="{{ url('/data/anak/prosesTambah') }}" method="POST">
                            @csrf
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="w-full sm:col-span-2">
                                    <label for="nik"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                                    <select id="nik" name="nik"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" selected>Pilih</option>
                                        @foreach ($penduduk as $p)
                                            <option value="{{ $p->nik }}">{{ $p->nik }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full">
                                    <label for="nama"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                        Lengkap</label>
                                    <input type="text" name="nama" id="nama"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500 cursor-not-allowed"
                                        placeholder="Nama Lengkap" required="" disabled>
                                </div>
                                <div>
                                    <label for="jenis_kelamin"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                        Kelamin</label>
                                    <fieldset>
                                        <legend class="sr-only">Jenis Kelamin</legend>

                                        <div class="flex items-center mb-4 space-x-4">
                                            <input id="jenis-kelamin-1" type="radio" name="jenis_kelamin"
                                                value="LAKI-LAKI"
                                                class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600 cursor-not-allowed"
                                                checked disabled>
                                            <label for="jenis-kelamin-1"
                                                class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300">
                                                LAKI-LAKI
                                            </label>

                                            <input id="jenis-kelamin-2" type="radio" name="jenis_kelamin"
                                                value="PEREMPUAN"
                                                class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600 cursor-not-allowed"
                                                disabled>
                                            <label for="jenis-kelamin-2"
                                                class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                PEREMPUAN
                                            </label>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="w-full">
                                    <label for="pendidikan"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pendidikan</label>
                                    <select id="pendidikan"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 cursor-not-allowed"
                                        disabled>
                                        <option value="" selected>Pilih</option>
                                        <option value="TIDAK / BELUM SEKOLAH">TIDAK / BELUM SEKOLAH</option>
                                        <option value="BELUM TAMAT SD / SEDERAJAT">BELUM TAMAT SD / SEDERAJAT</option>
                                        <option value="TAMAT SD / SEDERAJAT">TAMAT SD / SEDERAJAT</option>
                                        <option value="SLTP / SEDERAJAT">SLTP / SEDERAJAT</option>
                                        <option value="SLTA / SEDERAJAT">SLTA / SEDERAJAT</option>
                                        <option value="DIPLOMA I / II">DIPLOMA I / II</option>
                                        <option value="AKADEMI / DIPLOMA III / SARJANA MUDA">AKADEMI / DIPLOMA III /
                                            SARJANA MUDA</option>
                                        <option value="DIPLOMA IV / STRATA I">DIPLOMA IV / STRATA I</option>
                                        <option value="STRATA II">STRATA II</option>
                                        <option value="STRATA III">STRATA III</option>
                                    </select>
                                </div>
                                <div class="w-full">
                                    <label for="jenis_pekerjaan"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                        Pekerjaan</label>
                                    <input type="text" name="jenis_pekerjaan" id="jenis_pekerjaan"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500 cursor-not-allowed"
                                        placeholder="Jenis Pekerjaan" required="" disabled>
                                </div>

                                <h2 class="mb-0 sm:-mb-2 text-xl font-bold text-gray-900 dark:text-white">Data Anak</h2>
                                <div class="w-full sm:col-span-2">
                                    <label for="nik_anak"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                                    <select id="nik_anak" name="nik_anak"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" selected>Pilih</option>
                                        @foreach ($penduduk as $p)
                                            <option value="{{ $p->nik }}">{{ $p->nik }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full">
                                    <label for="nama_anak"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                        Lengkap</label>
                                    <input type="text" name="nama_anak" id="nama_anak"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500 cursor-not-allowed"
                                        placeholder="Nama Lengkap" required="" disabled>
                                </div>
                                <div>
                                    <label for="jenis_kelamin_anak"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                        Kelamin</label>
                                    <fieldset>
                                        <legend class="sr-only">Jenis Kelamin</legend>

                                        <div class="flex items-center mb-4 space-x-4">
                                            <input id="jenis-kelamin-anak-1" type="radio" name="jenis_kelamin_anak"
                                                value="LAKI-LAKI"
                                                class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600 cursor-not-allowed"
                                                checked disabled>
                                            <label for="jenis-kelamin-anak-1"
                                                class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300">
                                                LAKI-LAKI
                                            </label>

                                            <input id="jenis-kelamin-anak-2" type="radio" name="jenis_kelamin_anak"
                                                value="PEREMPUAN"
                                                class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600 cursor-not-allowed"
                                                disabled>
                                            <label for="jenis-kelamin-anak-2"
                                                class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                PEREMPUAN
                                            </label>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="w-full">
                                    <label for="tempat_lahir"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat
                                        Lahir</label>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500 cursor-not-allowed"
                                        placeholder="Tempat Lahir" required="" disabled>
                                </div>
                                <div class="w-full">
                                    <label for="tanggal_lahir"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Lahir</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input datepicker datepicker-autohide datepicker-buttons datepicker-autoselect-today
                                            datepicker-format="dd/mm/yyyy" type="text" name="tanggal_lahir"
                                            id="tanggal_lahir"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 cursor-not-allowed"
                                            placeholder="DD/MM/YYYY" disabled>
                                    </div>
                                </div>
                            </div>
                            <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-sky-700 rounded-lg focus:ring-4 focus:ring-sky-200 dark:focus:ring-sky-900 hover:bg-sky-800">
                                Tambah Data
                            </button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('nik').addEventListener('change', function() {
                var nik = this.value;
                if (nik) {
                    fetch(`/data/anak/getPendudukByNik/${nik}`)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('nama').value = data.nama;
                            if (data.jenis_kelamin === 'LAKI-LAKI') {
                                document.getElementById('jenis-kelamin-1').checked = true;
                            } else if (data.jenis_kelamin === 'PEREMPUAN') {
                                document.getElementById('jenis-kelamin-2').checked = true;
                            }
                            document.getElementById('pendidikan').value = data.pendidikan;
                            document.getElementById('jenis_pekerjaan').value = data.jenis_pekerjaan;

                        });
                } else {
                    document.getElementById('nama').value = '';
                    document.getElementById('jenis-kelamin-1').checked = true;
                    document.getElementById('jenis-kelamin-2').checked = false;
                    document.getElementById('pendidikan').value = '';
                    document.getElementById('jenis_pekerjaan').value = '';
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('nik_anak').addEventListener('change', function() {
                var nik = this.value;
                if (nik) {
                    fetch(`/data/anak/getPendudukByNik/${nik}`)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('nama_anak').value = data.nama;
                            if (data.jenis_kelamin === 'LAKI-LAKI') {
                                document.getElementById('jenis-kelamin-anak-1').checked = true;
                            } else if (data.jenis_kelamin === 'PEREMPUAN') {
                                document.getElementById('jenis-kelamin-anak-2').checked = true;
                            }
                            document.getElementById('tempat_lahir').value = data.tempat_lahir;
                            document.getElementById('tanggal_lahir').value = data.tanggal_lahir;
                        });
                } else {
                    document.getElementById('nama_anak').value = '';
                    document.getElementById('jenis-kelamin-anak-1').checked = true;
                    document.getElementById('jenis-kelamin-anak-2').checked = false;
                    document.getElementById('tempat_lahir').value = '';
                    document.getElementById('tanggal_lahir').value = '';
                }
            });
        });
    </script>
@endsection
