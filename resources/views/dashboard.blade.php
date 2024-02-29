<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">

            
                <div class="flex flex-col md:flex-row md:justify-between m-4 lg:mb-0 sm:m-4">
                    <div class="w-full md:w-1/2 bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6 mb-1 md:mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 fill-green-400" viewBox="0 0 576 512">
                            <path
                                d="M384 160c-17.7 0-32-14.3-32-32s14.3-32 32-32H544c17.7 0 32 14.3 32 32V288c0 17.7-14.3 32-32 32s-32-14.3-32-32V205.3L342.6 374.6c-12.5 12.5-32.8 12.5-45.3 0L192 269.3 54.6 406.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160c12.5-12.5 32.8-12.5 45.3 0L320 306.7 466.7 160H384z" />
                        </svg>
                        <h5 class="leading-none text-3xl font-bold text-green-600 dark:text-green-400 pb-2">IDR
                            {{ number_format($totalPemasukanToday, 0, ',', '.') }}
                        </h5>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Pemasukan Hari Ini</p>
                        <a href="{{ route('pencatatan.pemasukan.index') }}"
                            class="inline-flex font-medium items-center text-sm text-blue-600 hover:underline">
                            Lihat Pemasukan
                            <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                            </svg>
                        </a>
                    </div>
                    <div class="m-1"></div>
                    <div class="w-full md:w-1/2 bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-10 h-10 fill-red-600">
                            <path
                                d="M384 352c-17.7 0-32 14.3-32 32s14.3 32 32 32H544c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32s-32 14.3-32 32v82.7L342.6 137.4c-12.5-12.5-32.8-12.5-45.3 0L192 242.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0L320 205.3 466.7 352H384z" />
                        </svg>
                        <div class="flex flex-col">
                            <h5 class="leading-none text-3xl font-bold text-red-600 dark:text-red-600 pb-2">IDR
                                {{ number_format($totalPengeluaranToday, 0, ',', '.') }}
                            </h5>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">Pengeluaran Hari Ini</p>
                            <a href="{{ route('pencatatan.pengeluaran.index') }}"
                                class="inline-flex font-medium items-center text-sm text-blue-600 hover:underline">
                                Lihat Pengeluaran
                                <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

            <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-6 m-4 ">
                <div class="flex justify-between mb-5">
                    <div>
                        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">IDR
                            {{ number_format($saldo->Sisa_Saldo ?? 0, 0, ',', '.') }}
                        </h5>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Sisa Saldo</p>
                    </div>
                </div>
                <div id="legend-chart" class="responsive-chart"></div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
            <script>
                window.addEventListener("load", function() {
                    const options = {
                        series: [{
                                name: "Pengeluaran",
                                data: [
                                    @foreach ($pengeluaran as $p)
                                        {{ $p->Nominal_Pengeluaran }},
                                    @endforeach
                                ],
                                color: "#1A56DB",
                            },
                            {
                                name: "Pemasukan",
                                data: [
                                    @foreach ($pemasukan as $p)
                                        {{ $p->Nominal_Pemasukan }},
                                    @endforeach
                                ],
                                color: "#7E3BF2",
                            },
                        ],
                        chart: {
                            height: "100%",
                            width: "100%",
                            type: "area",
                            fontFamily: "Inter, sans-serif",
                            dropShadow: {
                                enabled: false,
                            },
                            toolbar: {
                                show: false,
                            },
                        },
                        tooltip: {
                            enabled: true,
                            x: {
                                show: false,
                            },
                        },
                        legend: {
                            show: true
                        },
                        fill: {
                            type: "gradient",
                            gradient: {
                                opacityFrom: 0.55,
                                opacityTo: 0,
                                shade: "#1C64F2",
                                gradientToColors: ["#1C64F2"],
                            },
                        },
                        dataLabels: {
                            enabled: false,
                        },
                        stroke: {
                            width: 6,
                        },
                        grid: {
                            show: false,
                            strokeDashArray: 4,
                            padding: {
                                left: 2,
                                right: 2,
                                top: -26
                            },
                        },
                        xaxis: {
                            categories: [
                                @foreach ($pengeluaran as $p)
                                    '{{ Carbon\Carbon::parse($p->Tanggal_Pengeluaran)->format('d-m-Y') }}',
                                @endforeach
                                @foreach ($pemasukan as $p)
                                    '{{ Carbon\Carbon::parse($p->Tanggal_Pemasukan)->format('d-m-Y') }}',
                                @endforeach
                            ],
                            labels: {
                                show: false,
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
                            labels: {
                                formatter: function(value) {
                                    if (typeof value === 'number' && !isNaN(value)) {
                                        return 'IDR ' + value.toLocaleString(
                                            'id-ID'); // 'id-ID' represents the locale for Indonesian
                                    } else {
                                        // Handle the case where value is not a valid number
                                        return 'N/A';
                                    }
                                }

                            }
                        },
                    }

                    if (document.getElementById("legend-chart") && typeof ApexCharts !== 'undefined') {
                        const chart = new ApexCharts(document.getElementById("legend-chart"), options);
                        chart.render();
                    }
                });
            </script>
        </div>
</x-app-layout>
