<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md text-gray-800 leading-tight text-white">
            {{ __('Data Master/Data Rute') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('success'))
                <span id="successMessage" class="font-medium relative overflow-x-auto text-green-400">{{ session()->get('success') }}!</span>
            @endif
            @if (session()->has('danger'))
                <span id="dangerMessage" class="font-medium relative overflow-x-auto text-red-400">{{ session()->get('danger') }}!</span>
            @endif
            @if (session()->has('warning'))
                <span id="warningMessage" class="font-medium relative overflow-x-auto text-yellow-400">{{ session()->get('warning') }}!</span>
            @endif
            @if (session()->has('info'))
                <span id="infoMessage" class="font-medium relative overflow-x-auto text-blue-400">{{ session()->get('info') }}!</span>
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
                <a href="{{ route('datamaster.rute.create') }}"
                    class="'inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150'">
                    Tambah Rute
                </a>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="myTable">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300 rounded-lg">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Kode Rute
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Asal Rute
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tujuan Rute
                            </th>
                            <th scope="col" class="px-6 py-3">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rute->sortBy('ID_Rute') as $rutes)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $rutes->ID_Rute }}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $rutes->Asal_Rute }}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $rutes->Tujuan_Rute }}
                                </td>
                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('datamaster.rute.edit', $rutes->ID_Rute) }}"
                                            class="inline-flex items-center px-4 py-2 bg-green-500 dark:bg-green-500 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest shadow-sm hover:bg-emerald-600 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">Edit</a>
                                        <form class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white" method="POST" action="{{ route('datamaster.rute.destroy', $rutes->ID_Rute) }}" onsubmit="return confirm('Are You Sure?')">
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
</x-app-layout>
