@extends('template.template')

@section('title')
    <title>Artikel | Tambah</title>
@endsection

@section('content')
    <main class="p-4 lg:ml-64 h-auto pt-20">
        <div class="rounded-lg mb-4">
            <section class="bg-gray-50 dark:bg-gray-900">
                <div class="mx-auto max-w-screen-xl">
                    <div
                        class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden py-2 px-4 flex items-center justify-between">
                        <h1 class="text-sm font-medium dark:text-white">Artikel / Tambah</h1>
                        <a href="{{ url('/artikel') }}"
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
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah Artikel Baru</h2>
                        <form action="{{ url('/artikel/prosesTambah') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="w-full sm:col-span-2">
                                    <div class="flex items-center justify-center w-full">
                                        <label id="dropzone" for="dropzone-file"
                                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            <div id="upload-instructions"
                                                class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                </svg>
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                        class="font-semibold">Click to upload</span> or drag and drop</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG, JPEG or
                                                    GIF</p>
                                            </div>
                                            <input id="dropzone-file" name="gambar" type="file" class="hidden"
                                                required="" />
                                            <img id="uploaded-image" class="hidden max-h-60" />
                                        </label>
                                    </div>
                                </div>
                                <div class="w-full sm:col-span-2">
                                    <label for="judul"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul
                                        Artikel</label>
                                    <input type="text" name="judul" id="judul"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                                        placeholder="Judul Artikel" required="">
                                </div>
                                <div class="w-full sm:col-span-2">
                                    <label for="isi"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Isi
                                        Artikel</label>
                                    <textarea name="isi" id="isi" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Isi Artikel" required=""></textarea>
                                </div>
                            </div>
                            <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-sky-700 rounded-lg focus:ring-4 focus:ring-sky-200 dark:focus:ring-sky-900 hover:bg-sky-800">
                                Tambah Artikel
                            </button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <script>
        const dropzone = document.getElementById('dropzone');
        const input = document.getElementById('dropzone-file');
        const img = document.getElementById('uploaded-image');
        const instructions = document.getElementById('upload-instructions');

        // Handle file drop
        dropzone.addEventListener('dragover', (event) => {
            event.preventDefault();
            dropzone.classList.add('border-blue-500');
        });

        dropzone.addEventListener('dragleave', () => {
            dropzone.classList.remove('border-blue-500');
        });

        dropzone.addEventListener('drop', (event) => {
            event.preventDefault();
            dropzone.classList.remove('border-blue-500');
            const files = event.dataTransfer.files;
            if (files.length > 0) {
                input.files = files; // Set the files to the input element
                handleFiles(files);
            }
        });

        // Handle file selection
        input.addEventListener('change', (event) => {
            const files = event.target.files;
            if (files.length > 0) {
                handleFiles(files);
            }
        });

        function handleFiles(files) {
            const file = files[0];
            if (file && (file.type === 'image/png' || file.type === 'image/jpeg' | file.type === 'image/jpg' || file
                    .type === 'image/gif' || file
                    .type === 'image/svg+xml')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    img.src = e.target.result;
                    img.classList.remove('hidden');
                    instructions.classList.add('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                alert('File type not supported or no file selected.');
            }
        }
    </script>
@endsection
