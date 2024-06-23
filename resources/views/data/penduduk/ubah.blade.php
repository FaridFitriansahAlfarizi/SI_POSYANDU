@extends('template.template')

@section('title')
    <title>Penduduk | Ubah</title>
@endsection

@section('content')
    <main class="p-4 lg:ml-64 h-auto pt-20">
        <div class="rounded-lg mb-4">
            <section class="bg-gray-50 dark:bg-gray-900">
                <div class="mx-auto max-w-screen-xl">
                    <div
                        class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden py-2 px-4 flex items-center justify-between">
                        <h1 class="text-sm font-medium dark:text-white">Data / Penduduk / Ubah</h1>
                        <a href="{{ url('/data/penduduk') }}"
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
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Ubah Penduduk</h2>
                        <form action="{{ url('/data/penduduk/prosesUbahPenduduk/' . $penduduks->nik) }}" method="POST">
                            @csrf
                            {!! method_field('PUT') !!}
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="w-full sm:col-span-2">
                                    <label for="nama"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                        Lengkap</label>
                                    <input type="text" name="nama" id="nama"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                                        placeholder="Nama Lengkap" value="{{ $penduduks->nama }}" required="">
                                </div>
                                <div class="w-full">
                                    <label for="nik"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                                    <input type="text" name="nik" id="nik"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                                        placeholder="NIK" value="{{ $penduduks->nik }}" required="">
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
                                                class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600"
                                                @if ($penduduks->jenis_kelamin == 'LAKI-LAKI') checked @endif>
                                            <label for="jenis-kelamin-1"
                                                class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300">
                                                LAKI-LAKI
                                            </label>

                                            <input id="jenis-kelamin-2" type="radio" name="jenis_kelamin"
                                                value="PEREMPUAN"
                                                class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600"
                                                @if ($penduduks->jenis_kelamin == 'PEREMPUAN') checked @endif>
                                            <label for="jenis-kelamin-2"
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
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                                        placeholder="Tempat Lahir" value="{{ $penduduks->tempat_lahir }}" required="">
                                </div>
                                <div class="w-full">
                                    <label for="tanggal_lahir"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Lahir</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input datepicker datepicker-autohide datepicker-buttons datepicker-autoselect-today
                                            datepicker-format="dd/mm/yyyy" type="text" name="tanggal_lahir"
                                            id="tanggal_lahir"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            value="{{ $penduduks->tanggal_lahir }}" placeholder="DD/MM/YYYY">
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label for="agama"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                                    <select id="agama" name="agama"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" @if ($penduduks->agama == '') selected @endif>Pilih</option>
                                        <option value="ISLAM" @if ($penduduks->agama == 'ISLAM') selected @endif>ISLAM
                                        </option>
                                        <option value="KRISTEN" @if ($penduduks->agama == 'KRISTEN') selected @endif>KRISTEN
                                        </option>
                                        <option value="KATOLIK" @if ($penduduks->agama == 'KATOLIK') selected @endif>KATOLIK
                                        </option>
                                        <option value="HINDU" @if ($penduduks->agama == 'HINDU') selected @endif>HINDU
                                        </option>
                                        <option value="BUDDHA" @if ($penduduks->agama == 'BUDDHA') selected @endif>BUDDHA
                                        </option>
                                        <option value="KHONGHUCU" @if ($penduduks->agama == 'KHONGHUCU') selected @endif>
                                            KHONGHUCU</option>
                                    </select>
                                </div>
                                <div class="w-full">
                                    <label for="pendidikan"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pendidikan</label>
                                    <select id="pendidikan" name="pendidikan"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" @if ($penduduks->pendidikan == '') selected @endif>Pilih</option>
                                        <option value="TIDAK / BELUM SEKOLAH"
                                            @if ($penduduks->pendidikan == 'TIDAK / BELUM SEKOLAH') selected @endif>TIDAK / BELUM SEKOLAH
                                        </option>
                                        <option value="BELUM TAMAT SD / SEDERAJAT"
                                            @if ($penduduks->pendidikan == 'BELUM TAMAT SD / SEDERAJAT') selected @endif>BELUM TAMAT SD / SEDERAJAT
                                        </option>
                                        <option value="TAMAT SD / SEDERAJAT"
                                            @if ($penduduks->pendidikan == 'TAMAT SD / SEDERAJAT') selected @endif>TAMAT SD / SEDERAJAT
                                        </option>
                                        <option value="SLTP / SEDERAJAT"
                                            @if ($penduduks->pendidikan == 'SLTP / SEDERAJAT') selected @endif>SLTP / SEDERAJAT</option>
                                        <option value="SLTA / SEDERAJAT"
                                            @if ($penduduks->pendidikan == 'SLTA / SEDERAJAT') selected @endif>SLTA / SEDERAJAT</option>
                                        <option value="DIPLOMA I / II" @if ($penduduks->pendidikan == 'DIPLOMA I / II') selected @endif>
                                            DIPLOMA I / II</option>
                                        <option value="AKADEMI / DIPLOMA III / SARJANA MUDA"
                                            @if ($penduduks->pendidikan == 'AKADEMI / DIPLOMA III / SARJANA MUDA') selected @endif>AKADEMI / DIPLOMA III /
                                            SARJANA MUDA</option>
                                        <option value="DIPLOMA IV / STRATA I"
                                            @if ($penduduks->pendidikan == 'DIPLOMA IV / STRATA I') selected @endif>DIPLOMA IV / STRATA I
                                        </option>
                                        <option value="STRATA II" @if ($penduduks->pendidikan == 'STRATA II') selected @endif>
                                            STRATA II</option>
                                        <option value="STRATA III" @if ($penduduks->pendidikan == 'STRATA III') selected @endif>
                                            STRATA III</option>
                                    </select>
                                </div>
                                <div class="w-full">
                                    <label for="jenis_pekerjaan"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                        Pekerjaan</label>
                                    <input type="text" name="jenis_pekerjaan" id="jenis_pekerjaan"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                                        placeholder="Jenis Pekerjaan" value="{{ $penduduks->jenis_pekerjaan }}"
                                        required="">
                                </div>
                                <div class="w-full">
                                    <label for="golongan_darah"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Golongan
                                        Darah</label>
                                    <select id="golongan_darah" name="golongan_darah"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" @if ($penduduks->golongan_darah == '') selected @endif>Pilih</option>
                                        <option value="A" @if ($penduduks->golongan_darah == 'A') selected @endif>A
                                        </option>
                                        <option value="B" @if ($penduduks->golongan_darah == 'B') selected @endif>B
                                        </option>
                                        <option value="AB" @if ($penduduks->golongan_darah == 'AB') selected @endif>AB
                                        </option>
                                        <option value="O" @if ($penduduks->golongan_darah == 'O') selected @endif>O
                                        </option>
                                        <option value="A+" @if ($penduduks->golongan_darah == 'A+') selected @endif>A+
                                        </option>
                                        <option value="B+" @if ($penduduks->golongan_darah == 'B+') selected @endif>B+
                                        </option>
                                    </select>
                                </div>
                                <div class="w-full">
                                    <label for="status_perkawinan"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                        Perkawinan</label>
                                    <select id="status_perkawinan" name="status_perkawinan"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" @if ($penduduks->status_perkawinan == '') selected @endif>Pilih</option>
                                        <option value="BELUM KAWIN" @if ($penduduks->status_perkawinan == 'BELUM KAWIN') selected @endif>
                                            BELUM KAWIN</option>
                                        <option value="KAWIN" @if ($penduduks->status_perkawinan == 'KAWIN') selected @endif>KAWIN
                                        </option>
                                        <option value="CERAI HIDUP" @if ($penduduks->status_perkawinan == 'CERAI HIDUP') selected @endif>
                                            CERAI HIDUP</option>
                                        <option value="CERAI MATI" @if ($penduduks->status_perkawinan == 'CERAI MATI') selected @endif>
                                            CERAI MATI</option>
                                    </select>
                                </div>
                                <div class="w-full">
                                    <label for="tanggal_perkawinan"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Perkawinan</label>
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
                                            datepicker-format="dd/mm/yyyy" type="text" name="tanggal_perkawinan"
                                            id="tanggal_perkawinan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            value="{{ $penduduks->tanggal_perkawinan }}" placeholder="DD/MM/YYYY">
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label for="status_hubungan_keluarga"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                        Hubungan Dalam Keluarga</label>
                                    <select id="status_hubungan_keluarga" name="status_hubungan_keluarga"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" @if ($penduduks->status_hubungan_keluarga == '') selected @endif>Pilih</option>
                                        <option value="KEPALA KELUARGA"
                                            @if ($penduduks->status_hubungan_keluarga == 'KEPALA KELUARGA') selected @endif>KEPALA KELUARGA</option>
                                        <option value="SUAMI" @if ($penduduks->status_hubungan_keluarga == 'SUAMI') selected @endif>SUAMI
                                        </option>
                                        <option value="ISTRI" @if ($penduduks->status_hubungan_keluarga == 'ISTRI') selected @endif>ISTRI
                                        </option>
                                        <option value="ANAK" @if ($penduduks->status_hubungan_keluarga == 'ANAK') selected @endif>ANAK
                                        </option>
                                        <option value="MENANTU" @if ($penduduks->status_hubungan_keluarga == 'MENANTU') selected @endif>MENANTU
                                        </option>
                                        <option value="CUCU" @if ($penduduks->status_hubungan_keluarga == 'CUCU') selected @endif>CUCU
                                        </option>
                                        <option value="ORANGTUA" @if ($penduduks->status_hubungan_keluarga == 'ORANGTUA') selected @endif>
                                            ORANGTUA</option>
                                        <option value="MERTUA" @if ($penduduks->status_hubungan_keluarga == 'MERTUA') selected @endif>MERTUA
                                        </option>
                                        <option value="FAMILI LAIN" @if ($penduduks->status_hubungan_keluarga == 'FAMILI LAIN') selected @endif>
                                            FAMILI LAIN</option>
                                        <option value="PEMBANTU" @if ($penduduks->status_hubungan_keluarga == 'PEMBANTU') selected @endif>
                                            PEMBANTU</option>
                                        <option value="LAINNYA" @if ($penduduks->status_hubungan_keluarga == 'LAINNYA') selected @endif>LAINNYA
                                        </option>
                                    </select>
                                </div>
                                <div class="w-full">
                                    <label for="kewarganegaraan"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kewarganegaraan</label>
                                    <input type="text" name="kewarganegaraan" id="kewarganegaraan"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                                        placeholder="Kewarganegaraan" value="{{ $penduduks->kewarganegaraan }}"
                                        required="">
                                </div>
                                <div class="w-full">
                                    <label for="username"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                    <input type="text" name="username" id="username"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500 cursor-not-allowed"
                                        placeholder="Username" disabled="true" value="{{ $penduduks->username }}" required="">
                                </div>
                                <div class="w-full">
                                    <label for="password"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                    <input type="password" name="password" id="password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                                        placeholder="Password">
                                </div>
                            </div>
                            <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-sky-700 rounded-lg focus:ring-4 focus:ring-sky-200 dark:focus:ring-sky-900 hover:bg-sky-800">
                                Ubah Penduduk
                            </button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
