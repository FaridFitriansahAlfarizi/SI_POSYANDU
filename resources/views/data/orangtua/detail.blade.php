@extends('template.template')

@section('title')
    <title>Orang Tua | Detail</title>
@endsection

@section('content')
    <main class="p-4 lg:ml-64 h-auto pt-20">
        <div class="rounded-lg mb-4">
            <section class="bg-gray-50 dark:bg-gray-900">
                <div class="mx-auto max-w-screen-xl">
                    <div
                        class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden py-2 px-4 flex items-center justify-between">
                        <h1 class="text-sm font-medium dark:text-white">Data / Orang Tua / Detail</h1>
                        <a href="{{ url('/data/orangtua') }}"
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
                        <h2 class="mb-10 text-xl font-semibold leading-none text-gray-900 md:text-2xl dark:text-white">
                            {{ $orangtua->nama }}</h2>
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="w-full">
                                <dl>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">NIK
                                    </dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                        {{ $orangtua->nik }}
                                    </dd>
                                </dl>
                            </div>
                            <div class="w-full">
                                <dl>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Jenis
                                        Kelamin
                                    </dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                        {{ $orangtua->jenis_kelamin }}</dd>
                                </dl>
                            </div>
                            <div class="w-full">
                                <dl>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Tempat
                                        Lahir
                                    </dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                        {{ $orangtua->tempat_lahir }}</dd>
                                </dl>
                            </div>
                            <div class="w-full">
                                <dl>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Tanggal
                                        Lahir
                                    </dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400 format-tanggal">
                                        {{ $orangtua->tanggal_lahir }}</dd>
                                </dl>
                            </div>
                            <div class="w-full">
                                <dl>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Agama</dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                        {{ $orangtua->agama }}</dd>
                                </dl>
                            </div>
                            <div class="w-full">
                                <dl>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Pendidikan
                                    </dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                        {{ $orangtua->pendidikan }}</dd>
                                </dl>
                            </div>
                            <div class="w-full">
                                <dl>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Jenis
                                        Pekerjaan
                                    </dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                        {{ $orangtua->jenis_pekerjaan }}</dd>
                                </dl>
                            </div>
                            <div class="w-full">
                                <dl>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Golongan
                                        Darah
                                    </dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                        {{ $orangtua->golongan_darah }}</dd>
                                </dl>
                            </div>
                            <div class="w-full">
                                <dl>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Status
                                        Perkawinan
                                    </dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                        {{ $orangtua->status_perkawinan }}</dd>
                                </dl>
                            </div>
                            <div class="w-full">
                                <dl>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Tanggal
                                        Perkawinan
                                    </dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400 format-tanggal">
                                        {{ $orangtua->tanggal_perkawinan }}</dd>
                                </dl>
                            </div>
                            <div class="w-full">
                                <dl>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Status
                                        Hubungan
                                        Dalam Keluarga</dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                        {{ $orangtua->status_hubungan_keluarga }}</dd>
                                </dl>
                            </div>
                            <div class="w-full">
                                <dl>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                        Kewarganegaraan
                                    </dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                        {{ $orangtua->kewarganegaraan }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
