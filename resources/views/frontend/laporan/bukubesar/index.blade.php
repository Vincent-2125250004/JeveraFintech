<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md text-gray-800 leading-tight dark:text-white">
            {{ __('Laporan/Buku Besar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                <div class="md:col-span-2">
                    <div class="relative">
                        <label for="search_account"
                            class="text-sm font-semibold text-black dark:text-white">Search</label>
                        <select id="search_account" name="search_account"
                            class="js-example-basic-single bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-1">
                            <option value="" disabled selected>Silahkan dipilih</option>
                            @foreach ($akun as $akuns)
                                <option value="{{ $akuns->id }}">
                                    {{ $akuns->Nama_Akun }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="md:col-span-2">
                    <div class="relative">
                        <label for="start_date" class="text-sm font-semibold text-black dark:text-white">Tanggal
                            Awal</label>
                        <input type="date" id="start_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-400 focus:border-primary-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Cari Akun" />
                    </div>
                </div>
                <div class="md:col-span-2">
                    <div class="relative">
                        <label for="end_date" class="text-sm font-semibold text-black dark:text-white">Tanggal
                            Akhir</label>
                        <input type="date" id="end_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-400 focus:border-primary-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Cari Akun" />
                    </div>
                </div>
            </div>

            <div class="relative overflow-x-auto">
                @foreach ($akun->sortBy('id') as $akuns)
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

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <div
                            class="text-xl my-4 text-gray-900 font-semibold items-center bg-sky-200 dark:bg-sky-700 dark:text-white rounded-lg">
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
                            </tr>
                        </thead>
                        <tbody>
                            @if ($value->isEmpty() && $valuePengeluaran->isEmpty() && $valueAdjetiva->isEmpty())
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td colspan="4"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                        Data tidak ditemukan</td>
                                </tr>
                            @endif
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
                                            IDR {{ number_format($values->Nominal_Pemasukan, 0, ',', '.') }}
                                        @endif
                                    </td>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        @if ($values->Dari_Akun == $akuns->id)
                                            IDR {{ number_format($values->Nominal_Pemasukan, 0, ',', '.') }}
                                        @endif
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
                                            IDR {{ number_format($values->Nominal_Pengeluaran, 0, ',', '.') }}
                                        @endif
                                    </td>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        @if ($values->Dari_Akun == $akuns->id)
                                            IDR {{ number_format($values->Nominal_Pengeluaran, 0, ',', '.') }}
                                        @endif
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
                                            IDR {{ number_format($values->Nominal_Adjetiva, 0, ',', '.') }}
                                        @endif
                                    </td>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        @if ($values->Dari_Akun == $akuns->id)
                                            IDR {{ number_format($values->Nominal_Adjetiva, 0, ',', '.') }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 font-semibold text-gray-900 dark:text-white">
                                <td colspan="2" class="px-6 py-3 text-base text-center">Current Total</td>

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

                                <td scope="col" class="px-6 py-3">IDR
                                    {{ number_format($totalDebit, 0, ',', '.') }}
                                </td>
                                <td scope="col" class="px-6 py-3">IDR
                                    {{ number_format($totalKredit, 0, ',', '.') }}
                                </td>
                            </tr>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 font-semibold text-gray-900 dark:text-white">
                                <td colspan="2" class="px-6 py-3 text-base text-center">Closing Balance</td>
                                </td>
                                <td scope="col" class="px-6 py-3">
                                    @if ($totalDebit > $totalKredit)
                                        @php
                                            $closingBalance = $totalDebit - $totalKredit;
                                        @endphp
                                        IDR {{ number_format($closingBalance, 0, ',', '.') }}
                                    @endif
                                    @if ($totalDebit == $totalKredit)
                                        -
                                    @endif

                                </td>
                                <td scope="col" class="px-6 py-3">
                                    @if ($totalKredit > $totalDebit)
                                        @php
                                            $closingBalance = $totalKredit - $totalDebit;
                                        @endphp
                                        IDR {{ number_format($closingBalance, 0, ',', '.') }}
                                    @endif
                                    @if ($totalDebit == $totalKredit)
                                        -
                                    @endif
                                </td>
                            </tr>
                        </tfoot>
                @endforeach
            </div>
        </div>  
    </div>
    <style>
        .dataTables_filter {
            visibility: hidden;
            display: none;
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
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();

            let jumlahTable = Array.apply(null, Array(countParent));
            console.log(jumlahTable);

            jumlahTable.forEach(function(element, index, array) {
                countTable++;

                let table = $('#myTable-' + countTable).DataTable({
                    responsive: true,
                    // searching : false,
                    rowReorder: {
                        selector: 'td:nth-child(2)'
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
                table.column(4).visible(false);

            });


            let dateIndex = 4;
            let minDate, maxDate;

            // Custom filtering function which will search data in column four between two values
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

            // Create date inputs
            minDate = new DateTime('#min', {
                format: 'YYYY MMMM Do'
            });
            maxDate = new DateTime('#max', {
                format: 'YYYY MMMM Do'
            });

            // Refilter the table
            document.querySelectorAll('#min, #max').forEach((el) => {
                el.addEventListener('change', () => {
                    // Loop through each DataTable instance and draw the table
                    for (let i = 1; i <= countParent; i++) {
                        $('#myTable-' + i).DataTable().draw();
                    }
                });
            });
        });

        function confirmDelete(form) {
            var link = form.action;

            Swal.fire({
                title: "Yakin ingin menghapus data?",
                text: "Anda tidak bisa mengembalikan datanya lagi!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!"
            }).then((willDelete) => {
                if (willDelete.isConfirmed) {
                    form.submit();
                } else {
                    Swal.fire("Data Kamu Aman!", "", "info");
                }
            });
            return false;
        }
    </script>
</x-app-layout>
