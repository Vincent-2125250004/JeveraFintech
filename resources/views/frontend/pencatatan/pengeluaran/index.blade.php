<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md text-gray-800 leading-tight dark:text-white">
            {{ __('Pencatatan/Pengeluaran/Data Pengeluaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-20 mx-auto sm:px-6 lg:px-8">
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

            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('pencatatan.pengeluaran.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                    Tambah Pengeluaran
                </a>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 display responsive wrap" width="100%" id="myTable">
                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300 rounded-lg">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nomor Referensi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Kontak
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nominal Pengeluaran
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Akun Transaksi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Pengeluaran
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Sisa Saldo
                            </th>
                            <th scope="col" class="px-6 py-3">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengeluaran as $pengeluarans)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $pengeluarans->Nomor_Referensi }}
                                </td>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $pengeluarans->Nama_Kontak }}
                                </td>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Rp{{ number_format($pengeluarans->Nominal_Pengeluaran, 0, ',', '.') }}
                                </td>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $pengeluarans->DariAkun->Nama_Akun }} - {{ $pengeluarans->KeAkun->Nama_Akun }}
                                </td>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $pengeluarans->Tanggal_Pengeluaran }}
                                </td>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @if ($pengeluarans->saldo)
                                        Rp{{ number_format($pengeluarans->saldo->Sisa_Saldo, 0, ',', '.') }}
                                    @else
                                        No Sisa Saldo Found
                                    @endif
                                </td>


                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('pencatatan.pengeluaran.edit', $pengeluarans->id) }}"
                                            title="Edit Data Pengeluaran"
                                            class="inline-flex items-center px-4 py-2 bg-green-500 dark:bg-green-500 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest shadow-sm hover:bg-emerald-600 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150"><svg
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                class="w-5 h-5 fill-white">
                                                <path
                                                    d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                            </svg></a>
                                        <a href="{{ route('pencatatan.pengeluaran.journalVoucher', $pengeluarans->id) }}"
                                            target="_blank"
                                            class="inline-flex  items-center px-4 py-2 bg-sky-500 dark:bg-sky-500 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest shadow-sm hover:bg-sky-600 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150"
                                            title="Journal Voucher"><svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 640 512" class="w-5 h-5 fill-white">
                                                <path
                                                    d="M128 0C110.3 0 96 14.3 96 32V224h96V192c0-35.3 28.7-64 64-64H480V32c0-17.7-14.3-32-32-32H128zM256 160c-17.7 0-32 14.3-32 32v32h96c35.3 0 64 28.7 64 64V416H576c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32H256zm240 64h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H496c-8.8 0-16-7.2-16-16V240c0-8.8 7.2-16 16-16zM64 256c-17.7 0-32 14.3-32 32v13L187.1 415.9c1.4 1 3.1 1.6 4.9 1.6s3.5-.6 4.9-1.6L352 301V288c0-17.7-14.3-32-32-32H64zm288 84.8L216 441.6c-6.9 5.1-15.3 7.9-24 7.9s-17-2.8-24-7.9L32 340.8V480c0 17.7 14.3 32 32 32H320c17.7 0 32-14.3 32-32V340.8z" />
                                            </svg></a>
                                        <form method="POST" title="Delete Data Pengeluaran"
                                            action="{{ route('pencatatan.pengeluaran.destroy', $pengeluarans->id) }}"
                                            onsubmit="return confirmDelete(this)">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white inline-flex items-center px-4 py-2 bg-red-500 dark:bg-red-500 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest shadow-sm hover:bg-emerald-600 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150"><svg
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                    class="w-5 h-5 fill-white">
                                                    <path
                                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                                </svg></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.tailwindcss.min.js"></script>
    <script>
        $(document).ready(function() {
            let table = $('#myTable').DataTable({
                responsive:true,
            });
            $('#myTable_wrapper').addClass('overflow-y-hidden p-1');
            $('#myTable_filter').addClass('text-black font-semibold dark:text-white');
            $('#myTable_filter input').addClass(
                'text-black font-semibold mt-2 mb-2 dark:text-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md px-2 py-1 ms-4'
            );
            $('#myTable_length').addClass('text-black font-semibold dark:text-white');
            $('#myTable_length select').addClass(
                'text-black font-semibold dark:text-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md px-6 py-1 ms-4'
            );
            $('#myTable_info').addClass('text-black font-semibold dark:text-white text-sm');
            $('#myTable_paginate').addClass('text-black font-semibold dark:text-white mt-4');
            $('#myTable_next').addClass('text-black font-semibold dark:text-white ms-4');
            $('#myTable_previous').addClass('text-black font-semibold dark:text-white me-4');


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
