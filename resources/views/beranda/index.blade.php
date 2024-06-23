@extends('template.template')

@section('title')
    <title>Beranda</title>
@endsection

@section('content')
    <main class="p-4 lg:ml-64 h-auto pt-20">
        <div class="rounded-lg mb-4">
            <section class="bg-gray-50 dark:bg-gray-900">
                <div class="mx-auto max-w-screen-xl">
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
                        <h1 class="text-sm font-medium dark:text-white">Beranda</h1>
                    </div>
                </div>
            </section>
        </div>

        <div class="rounded-lg mb-4">
            <section class="bg-gray-50 dark:bg-gray-900">
                <div class="mx-auto max-w-screen-xl">
                    @if (Auth::user()->level == 'ADMIN' || Auth::user()->level == 'PETUGAS')
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 mb-4">
                            <div class="max-w-full w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                                <div class="flex justify-between mb-3">
                                    <div class="flex justify-center items-center">
                                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-1">
                                            Perbandingan Jumlah Orang Tua & Anak</h5>
                                    </div>
                                </div>

                                <!-- Donut Chart -->
                                <div class="py-6" id="donut-chart"></div>
                            </div>

                            <div class="max-w-full w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                                <div class="flex justify-between items-start w-full">
                                    <div class="flex-col items-center">
                                        <div class="flex items-center mb-1">
                                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">
                                                Perbandingan Jumlah Jenis Kelamin Anak</h5>
                                        </div>
                                    </div>
                                </div>

                                <!-- Line Chart -->
                                <div class="py-6" id="pie-chart"></div>
                            </div>
                        </div>

                        <div class="grid gap-4 mb-4">
                            <div class="max-w-full w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                                <div class="flex justify-between pb-4 mb-4">
                                    <div class="flex items-center">
                                        <div>
                                            <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">
                                                Jumlah Anak Terimunisasi</h5>
                                        </div>
                                    </div>
                                </div>

                                <div id="column-chart"></div>
                            </div>
                        </div>
                    @endif

                    <h2 class="mb-4 text-xl font-semibold leading-none text-gray-900 md:text-2xl dark:text-white">
                        Profil Orang Tua</h2>
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4 mb-4">
                        <h2 class="mb-10 text-xl font-semibold leading-none text-gray-900 md:text-2xl dark:text-white">
                            {{ $profil_orangtua->nama }}</h2>
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="w-full">
                                <dl>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">NIK
                                    </dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                        {{ $profil_orangtua->nik }}
                                    </dd>
                                </dl>
                            </div>
                            <div class="w-full">
                                <dl>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Jenis Kelamin
                                    </dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                        {{ $profil_orangtua->jenis_kelamin }}</dd>
                                </dl>
                            </div>
                            <div class="w-full">
                                <dl>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Pendidikan
                                    </dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                        {{ $profil_orangtua->pendidikan }}
                                    </dd>
                                </dl>
                            </div>
                            <div class="w-full">
                                <dl>
                                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Jenis
                                        Pekerjaan
                                    </dt>
                                    <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                        {{ $profil_orangtua->jenis_pekerjaan }}
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <a href="{{ url('/beranda/profil/orangtua/' . session('nik')) }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Detail
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>

                    <h2 class="mb-4 text-xl font-semibold leading-none text-gray-900 md:text-2xl dark:text-white">
                        Profil Anak</h2>
                    <div class="grid gap-4 sm:grid-cols-2 mb-4">
                        @foreach ($profil_anak as $pa)
                            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
                                <h2
                                    class="mb-10 text-xl font-semibold leading-none text-gray-900 md:text-2xl dark:text-white">
                                    {{ $pa->nama }}</h2>
                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                    <div class="w-full">
                                        <dl>
                                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">NIK
                                            </dt>
                                            <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                {{ $pa->nik }}
                                            </dd>
                                        </dl>
                                    </div>
                                    <div class="w-full">
                                        <dl>
                                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Jenis
                                                Kelamin
                                            </dt>
                                            <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                {{ $pa->jenis_kelamin }}
                                            </dd>
                                        </dl>
                                    </div>
                                    <div class="w-full">
                                        <dl>
                                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                Tempat
                                                Lahir
                                            </dt>
                                            <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                {{ $pa->tempat_lahir }}</dd>
                                        </dl>
                                    </div>
                                    <div class="w-full">
                                        <dl>
                                            <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                Tanggal
                                                Lahir
                                            </dt>
                                            <dd
                                                class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400 format-tanggal">
                                                {{ $pa->tanggal_lahir }}
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                                <a href="{{ url('/beranda/profil/anak/' . $pa->nik) }}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Detail
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                                <a href="{{ url('/beranda/grafik/anak/' . $pa->nik) }}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                    Grafik Pertumbuhan
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </main>

    <script>
        const getChartOptions = () => {
            const orangtua = {{ $orangtua }};
            const anak = {{ $anak }};

            return {
                series: [orangtua, anak],
                colors: ["#1C64F2", "#16BDCA"],
                chart: {
                    height: 420,
                    width: "100%",
                    type: "donut",
                },
                stroke: {
                    colors: ["transparent"],
                    lineCap: "",
                },
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: true,
                                name: {
                                    show: true,
                                    fontFamily: "Inter, sans-serif",
                                    offsetY: 20,
                                },
                                total: {
                                    showAlways: true,
                                    show: true,
                                    label: "Total",
                                    fontFamily: "Inter, sans-serif",
                                    formatter: function(w) {
                                        const sum = w.globals.seriesTotals.reduce((a, b) => a + b, 0);
                                        return sum;
                                    },
                                },
                                value: {
                                    show: true,
                                    fontFamily: "Inter, sans-serif",
                                    offsetY: -20,
                                    formatter: function(value) {
                                        return value;
                                    },
                                },
                            },
                            size: "80%",
                        },
                    },
                },
                grid: {
                    padding: {
                        top: -2,
                    },
                },
                labels: ["Orangtua", "Anak"],
                dataLabels: {
                    enabled: false,
                },
                legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return value;
                        },
                    },
                },
                xaxis: {
                    labels: {
                        formatter: function(value) {
                            return value;
                        },
                    },
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                },
            }
        }

        if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("donut-chart"), getChartOptions());
            chart.render();
        }
    </script>

    <script>
        const imunisasiCounts = @json($imunisasiCounts);

        // Buat array untuk nama-nama bulan dalam bahasa Indonesia
        const namaBulan = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        // Fungsi untuk mengubah format tanggal
        function ubahFormatTanggal(tanggal) {
            const [day, month, year] = tanggal.split('/');
            const monthName = namaBulan[parseInt(month) - 1];
            return `${parseInt(day)} ${monthName} ${year}`;
        }

        const dataSeries = imunisasiCounts.map(item => {
            return {
                x: ubahFormatTanggal(item.tanggal_imunisasi),
                y: item.total
            };
        });

        const options = {
            colors: ["#1A56DB", "#FDBA8C"],
            series: [{
                name: "Jumlah Anak",
                color: "#1A56DB",
                data: dataSeries
            }],
            chart: {
                type: "bar",
                height: "320px",
                fontFamily: "Inter, sans-serif",
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "70%",
                    borderRadiusApplication: "end",
                    borderRadius: 8,
                },
            },
            tooltip: {
                shared: true,
                intersect: false,
                style: {
                    fontFamily: "Inter, sans-serif",
                },
            },
            states: {
                hover: {
                    filter: {
                        type: "darken",
                        value: 1,
                    },
                },
            },
            stroke: {
                show: true,
                width: 0,
                colors: ["transparent"],
            },
            grid: {
                show: false,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: -14
                },
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: false,
            },
            xaxis: {
                floating: false,
                labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: {
                show: false,
            },
            fill: {
                opacity: 1,
            },
        }

        if (document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("column-chart"), options);
            chart.render();
        }
    </script>

    <script>
        const getChart = () => {
            const jenisKelaminData = @json($jenis_kelamin);

            const labels = jenisKelaminData.map(item => item.jenis_kelamin);
            const series = jenisKelaminData.map(item => item.total);

            return {
                series: series,
                colors: ["#1C64F2", "#16BDCA"],
                chart: {
                    height: 420,
                    width: "100%",
                    type: "pie",
                },
                stroke: {
                    colors: ["white"],
                    lineCap: "",
                },
                plotOptions: {
                    pie: {
                        labels: {
                            show: true,
                        },
                        size: "100%",
                        dataLabels: {
                            offset: -25
                        }
                    },
                },
                labels: labels,
                dataLabels: {
                    enabled: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                    },
                },
                legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return value
                        },
                    },
                },
                xaxis: {
                    labels: {
                        formatter: function(value) {
                            return value
                        },
                    },
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                },
            }
        }

        if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("pie-chart"), getChart());
            chart.render();
        }
    </script>
@endsection
