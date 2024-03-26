<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$filename");
?>

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

        <table border="1" class="w-full text-sm text-left text-gray-500 dark:text-gray-400 display responsive wrap"
            width="100%" id="myTable-<?php echo $countParent; ?>">
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
                                {{ $values->Nominal_Pemasukan }}
                            @endif
                        </td>
                        <td scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @if ($values->Dari_Akun == $akuns->id)
                                {{ $values->Nominal_Pemasukan}}
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
                                {{$values->Nominal_Pengeluaran}}
                            @endif
                        </td>
                        <td scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @if ($values->Dari_Akun == $akuns->id)
                                {{$values->Nominal_Pengeluaran}}
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
                                {{$values->Nominal_Adjetiva}}
                            @endif
                        </td>
                        <td scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @if ($values->Dari_Akun == $akuns->id)
                                {{$values->Nominal_Adjetiva}}
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
                        {{$totalDebit}}
                    </td>
                    <td scope="col" class="px-6 py-3 text-cyan-600 dark:text-cyan-400">
                        {{$totalKredit}}
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
                            {{$closingBalance}}
                        @endif

                    </td>
                    <td scope="col" class="px-6 py-3 text-emerald-600 dark:text-emerald-400">
                        @if ($totalKredit > $totalDebit)
                            @php
                                $closingBalance = $totalKredit - $totalDebit;
                            @endphp
                            {{$closingBalance}}
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