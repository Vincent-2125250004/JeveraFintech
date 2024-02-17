<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md text-gray-800 leading-tight dark:text-white">
            {{ __('Data Master/Data Mobil') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('success'))
                <span id="successMessage"
                    class="font-medium relative overflow-x-auto text-green-400">{{ session()->get('success') }}!</span>
            @endif
            @if (session()->has('danger'))
                <span id="dangerMessage"
                    class="font-medium relative overflow-x-auto text-red-400">{{ session()->get('danger') }}!</span>
            @endif
            @if (session()->has('warning'))
                <span id="warningMessage"
                    class="font-medium relative overflow-x-auto text-yellow-400">{{ session()->get('warning') }}!</span>
            @endif
            @if (session()->has('info'))
                <span id="infoMessage"
                    class="font-medium relative overflow-x-auto text-blue-400">{{ session()->get('info') }}!</span>
            @endif

            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
                $(document).ready(function() {
                    setTimeout(function() {
                        $('#successMessage, #dangerMessage, #warningMessage, #infoMessage').fadeOut('slow');
                    }, 5000);
                });
            </script>

            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('datamaster.mobil.create') }}"
                    class="'inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150'">
                    Tambah Mobil
                </a>
                <a href="{{ route('datamaster.mobil.pdf') }}" target="_blank"
                    class="'inline-flex items-center ms-4 px-4 py-2 bg-sky-400 dark:bg-sky-600 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150'">
                    Unduh Data Mobil
                </a>
            </div>
            <div class="relative overflow-x-auto " >
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="myTable">
                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300 rounded-lg">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Kode Mobil
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nomor Polisi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nomor Lambung
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Pemilik
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nomor Seri
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nomor Rangka
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nomor Mesin
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Masuk
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Keluar
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Berkas Pendukung
                            </th>
                            <th scope="col" class="px-6 py-3">
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($mobil->sortBy('id') as $mobils)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $mobils->id }}
                                </td>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $mobils->Nomor_Polisi }}
                                </td>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $mobils->Nomor_Lambung }}
                                </td>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $mobils->Pemilik }}
                                </td>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $mobils->Nomor_Seri }}
                                </td>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $mobils->Nomor_Rangka }}
                                </td>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $mobils->Nomor_Mesin }}
                                </td>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $mobils->Tanggal_Masuk }}
                                </td>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $mobils->Tanggal_Keluar }}
                                </td>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $mobils->berkas->count() ?? 0 }}
                                </td>

                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('datamaster.mobil.edit', $mobils->id) }}"
                                            class="inline-flex items-center px-4 py-2 bg-green-500 dark:bg-green-500 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest shadow-sm hover:bg-emerald-600 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">Edit</a>
                                        <a href="{{ route('datamaster.mobil.images', $mobils->id) }}"
                                            class="inline-flex items-center px-4 py-2 bg-yellow-500 dark:bg-yellow-500 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest shadow-sm hover:bg-emerald-600 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">View
                                            Berkas</a>
                                        <form
                                            class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white inline-flex items-center px-4 py-2 bg-red-500 dark:bg-red-500 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest shadow-sm hover:bg-emerald-600 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150"
                                            method="POST"
                                            action="{{ route('datamaster.mobil.destroy', $mobils->id) }}"
                                            onsubmit="return confirm('Are You Sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="uppercase">Delete</button>
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
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.tailwindcss.min.js"></script>
        <script>
            $(document).ready(function() {
                let table =  $('#myTable').DataTable();
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
        </script>
</x-app-layout>
