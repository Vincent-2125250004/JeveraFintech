<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md text-gray-800 leading-tight dark:text-white">
            {{ __('Laporan/Buku Besar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto lg:px-8">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                <div class="md:col-span-2 mx-2">
                    <div class="relative">
                        <label for="min" class="text-sm font-semibold text-black dark:text-white">Tanggal
                            Awal</label>
                        <input type="text" id="min"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-400 focus:border-primary-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Tanggal Awal" />
                    </div>
                </div>
                <div class="md:col-span-2 mx-2">
                    <div class="relative">
                        <label for="max" class="text-sm font-semibold text-black dark:text-white">Tanggal
                            Akhir</label>
                        <input type="text" id="max"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-400 focus:border-primary-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Tanggal Akhir" />
                    </div>
                </div>
                <div class="md:col-span-2 mx-2">
                    <div class="flex justify-end m-2 p-2">
                        <a href="{{ route('laporan.bukubesar.excel') }}" target="_blank"
                            class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                                class="w-5 h-5 fill-gray-600 dark:fill-white mx-2">
                                <path
                                    d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM155.7 250.2L192 302.1l36.3-51.9c7.6-10.9 22.6-13.5 33.4-5.9s13.5 22.6 5.9 33.4L221.3 344l46.4 66.2c7.6 10.9 5 25.8-5.9 33.4s-25.8 5-33.4-5.9L192 385.8l-36.3 51.9c-7.6 10.9-22.6 13.5-33.4 5.9s-13.5-22.6-5.9-33.4L162.7 344l-46.4-66.2c-7.6-10.9-5-25.8 5.9-33.4s25.8-5 33.4 5.9z" />
                            </svg>
                            Excel
                        </a>
                    </div>
                </div>
            </div>

            <div class="relative overflow-x-auto mx-2">
                <?php
                $countParent = 0;
                ?>
                @foreach ($akun->sortBy('id') as $akuns)
                    <?php
                    $countParent++;
                    ?>
                    @php
                        $value = App\Models\Pemasukan::where('Dari_Akun', $akuns->id)
                            ->orWhere('Ke_Akun', $akuns->id)
                            ->get();
                        $valuePengeluaran = App\Models\Pengeluaran::where('Dari_Akun', $akuns->id)
                            ->orWhere('Ke_Akun', $akuns->id)
                            ->get();
                        $valueAdjetiva = App\Models\Adjetiva::where('Dari_Akun', $akuns->id)
                            ->orWhere('Ke_Akun', $akuns->id)
                            ->get();
                    @endphp

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 display responsive wrap"
                        width="100%" id="myTable-<?php echo $countParent; ?>">
                        <div class="text-xl my-4 text-gray-900 font-semibold items-center bg-sky-200 dark:bg-sky-700 dark:text-white rounded-lg">
                            <h2 class="p-4 text-center">{{ $akuns->Nama_Akun }}</h2>
                        </div>
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300 rounded-lg">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nomor Referensi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Keterangan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Debit
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kredit
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($value as $values)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $values->Nomor_Referensi }}
                                    </td>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $values->Deskripsi }}
                                    </td>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        @if ($values->Ke_Akun == $akuns->id)
                                            Rp{{ number_format($values->Nominal_Pemasukan, 0, ',', '.') }}
                                        @endif
                                    </td>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        @if ($values->Dari_Akun == $akuns->id)
                                            Rp{{ number_format($values->Nominal_Pemasukan, 0, ',', '.') }}
                                        @endif
                                    </td>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $values->Tanggal_Pemasukan }}
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($valuePengeluaran as $values)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $values->Nomor_Referensi }}
                                    </td>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $values->Deskripsi }}
                                    </td>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        @if ($values->Ke_Akun == $akuns->id)
                                            Rp{{ number_format($values->Nominal_Pengeluaran, 0, ',', '.') }}
                                        @endif
                                    </td>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        @if ($values->Dari_Akun == $akuns->id)
                                            Rp{{ number_format($values->Nominal_Pengeluaran, 0, ',', '.') }}
                                        @endif
                                    </td>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $values->Tanggal_Pengeluaran }}
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($valueAdjetiva as $values)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $values->Nomor_Referensi }}
                                    </td>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $values->Deskripsi }}
                                    </td>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        @if ($values->Ke_Akun == $akuns->id)
                                            Rp{{ number_format($values->Nominal_Adjetiva, 0, ',', '.') }}
                                        @endif
                                    </td>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        @if ($values->Dari_Akun == $akuns->id)
                                            Rp{{ number_format($values->Nominal_Adjetiva, 0, ',', '.') }}
                                        @endif
                                    </td>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $values->Tanggal_Adjetiva }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 font-semibold text-gray-900 dark:text-white">
                                <td colspan="2"
                                    class="px-6 py-3 text-base text-center text-cyan-600 dark:text-cyan-400">Current
                                    Total</td>
                                @php
                                    $totalDebit = 0;
                                    $totalKredit = 0;
                                    $totalSaldo = 0;
                                    $closingBalance = 0;
                                @endphp

                                @foreach ($value as $values)
                                    @if ($values->Ke_Akun == $akuns->id)
                                        @php
                                            $totalDebit += $values->Nominal_Pemasukan;
                                            $totalSaldo += $values->saldo->Sisa_Saldo;
                                        @endphp
                                    @endif

                                    @if ($values->Dari_Akun == $akuns->id)
                                        @php
                                            $totalKredit += $values->Nominal_Pemasukan;
                                            $totalSaldo += $values->saldo->Sisa_Saldo;
                                        @endphp
                                    @endif
                                @endforeach

                                @foreach ($valuePengeluaran as $values)
                                    @if ($values->Ke_Akun == $akuns->id)
                                        @php
                                            $totalDebit += $values->Nominal_Pengeluaran;
                                            $totalSaldo += $values->saldo->Sisa_Saldo;
                                        @endphp
                                    @endif

                                    @if ($values->Dari_Akun == $akuns->id)
                                        @php
                                            $totalKredit += $values->Nominal_Pengeluaran;
                                            $totalSaldo += $values->saldo->Sisa_Saldo;
                                        @endphp
                                    @endif
                                @endforeach

                                @foreach ($valueAdjetiva as $values)
                                    @if ($values->Ke_Akun == $akuns->id)
                                        @php
                                            $totalDebit += $values->Nominal_Adjetiva;
                                            $totalSaldo += $values->saldo->Sisa_Saldo;
                                        @endphp
                                    @endif

                                    @if ($values->Dari_Akun == $akuns->id)
                                        @php
                                            $totalKredit += $values->Nominal_Adjetiva;
                                            $totalSaldo += $values->saldo->Sisa_Saldo;
                                        @endphp
                                    @endif
                                @endforeach

                                <td scope="col" class="px-6 py-3 text-cyan-600 dark:text-cyan-400">
                                    Rp{{ number_format($totalDebit, 0, ',', '.') }}
                                </td>
                                <td scope="col" class="px-6 py-3 text-cyan-600 dark:text-cyan-400">
                                    Rp{{ number_format($totalKredit, 0, ',', '.') }}
                                </td>
                                <td></td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 font-semibold text-gray-900 dark:text-white">
                                <td colspan="2"
                                    class="px-6 py-3 text-base text-center text-emerald-600 dark:text-emerald-400">
                                    Closing Balance</td>
                                <td scope="col" class="px-6 py-3 text-emerald-600 dark:text-emerald-400">
                                    @if ($totalDebit > $totalKredit)
                                        @php
                                            $closingBalance = $totalDebit - $totalKredit;
                                        @endphp
                                        Rp{{ number_format($closingBalance, 0, ',', '.') }}
                                    @endif

                                </td>
                                <td scope="col" class="px-6 py-3 text-emerald-600 dark:text-emerald-400">
                                    @if ($totalKredit > $totalDebit)
                                        @php
                                            $closingBalance = $totalKredit - $totalDebit;
                                        @endphp
                                        Rp{{ number_format($closingBalance, 0, ',', '.') }}
                                    @endif
                                    @if ($totalDebit == $totalKredit)
                                        -
                                    @endif
                                </td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                @endforeach
            </div>
        </div>
    </div>
    <style>
        .dataTables_filter {
            visibility: hidden;
            display: none;
        }

        td.dataTables_empty {
            color: #27272a;
            font-weight: bold;
            text-align: center;
            background-color: #facc15;
            padding: 20px;
            font-size: 150%
        }

        div.dt-datetime-title {
            color: white;
        }

        select.dt-datetime-month {
            color: black;
        }

        select.dt-datetime-year {
            color: black;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.tailwindcss.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.5.2/js/dataTables.dateTime.min.js"></script>

    <script>
        $(document).ready(function() {
            let countParent = <?php echo $countParent; ?>;
            var countTable = 0;
            $('.js-example-basic-single').select2();

            let jumlahTable = Array.apply(null, Array(countParent));
            console.log(jumlahTable);

            jumlahTable.forEach(function(element, index, array) {
                countTable++;

                let table = $('#myTable-' + countTable).DataTable({
                    responsive: true,
                    "language": {
                        "emptyTable": "Tidak ada data"
                    }
                });

                $('#myTable-' + countTable + '_wrapper').addClass('overflow-y-hidden p-1');
                $('#myTable-' + countTable + '_length').addClass(
                    'text-black font-semibold dark:text-white mb-2');
                $('#myTable-' + countTable + '_length select').addClass(
                    'mb-2 text-black font-semibold dark:text-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md px-6 py-1 ms-4'
                );
                $('#myTable-' + countTable + '_info').addClass(
                    'text-black font-semibold dark:text-white text-sm');
                $('#myTable-' + countTable + '_paginate').addClass(
                    'text-black font-semibold dark:text-white mt-4');
                $('#myTable-' + countTable + '_next').addClass(
                    'text-black font-semibold dark:text-white ms-4');
                $('#myTable-' + countTable + '_previous').addClass(
                    'text-black font-semibold dark:text-white me-4');
                $('#myTable-' + countTable + 'max').addClass(
                    'text-black font-semibold mt-2 mb-2 dark:text-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md px-2 py-1 ms-4'
                );
                $()
                table.column(4).visible(false);

            });


            let dateIndex = 4;
            let minDate, maxDate;
            DataTable.ext.search.push(function(settings, data, dataIndex) {
                let min = minDate.val();
                let max = maxDate.val();
                let date = new Date(data[dateIndex]);

                if (
                    (min === null && max === null) ||
                    (min === null && date <= max) ||
                    (min <= date && max === null) ||
                    (min <= date && date <= max)
                ) {
                    return true;
                }
                return false;
            });

            minDate = new DateTime('#min', {
                format: 'YYYY MMMM Do'
            });
            maxDate = new DateTime('#max', {
                format: 'YYYY MMMM Do'
            });

            document.querySelectorAll('#min, #max').forEach((el) => {
                el.addEventListener('change', () => {
                    for (let i = 1; i <= countParent; i++) {
                        $('#myTable-' + i).DataTable().draw();
                    }
                });
            });
        });
    </script>
</x-app-layout>