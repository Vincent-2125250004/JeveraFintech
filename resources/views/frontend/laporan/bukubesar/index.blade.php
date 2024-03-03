<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md text-gray-800 leading-tight dark:text-white">
            {{ __('Laporan/Buku Besar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            @if (session()->has('success') || session()->has('danger') || session()->has('warning') || session()->has('info'))
                <script>
                    function showToast(icon, message) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            },
                            willClose: (toast) => {
                                if (toast.getAttribute('aria-live') === 'polite') {
                                    toast.style.transition = 'opacity 1s ease-out';
                                    toast.style.opacity = 0;
                                }
                            }
                        });

                        Toast.fire({
                            icon: icon,
                            title: message
                        });
                    }

                    @if (session()->has('success'))
                        showToast('success', "{{ session()->get('success') }}!");
                    @endif

                    @if (session()->has('danger'))
                        showToast('error', "{{ session()->get('danger') }}!");
                    @endif

                    @if (session()->has('warning'))
                        showToast('warning', "{{ session()->get('warning') }}!");
                    @endif

                    @if (session()->has('info'))
                        showToast('info', "{{ session()->get('info') }}!");
                    @endif
                </script>
            @endif
            {{-- <div class="lg:col-span-2">
                
            </div> --}}

            <div class="relative overflow-x-auto">
                @foreach ($akun->sortBy('id') as $akuns)
                    @php
                        $value = App\Models\Pemasukan::where('Dari_Akun', $akuns->id)
                            ->orWhere('Ke_Akun', $akuns->id)
                            ->get();
                        $valuePengeluaran = App\Models\Pengeluaran::where('Dari_Akun', $akuns->id)
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

    <script>
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
