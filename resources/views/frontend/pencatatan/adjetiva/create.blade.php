<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-md text-gray-800 leading-tight dark:text-white">
            {{ __('Pencatatan/Adjetiva/Tambah Adjetiva') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end m-2 p-2">
            <a href="{{ route('pencatatan.adjetiva.index') }}"
                class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                Data Adjetiva
            </a>
        </div>

        <div class="px-2 py-8 mx-auto max-w-2xl lg:py-16 bg-white dark:bg-gray-700 m-12 rounded-lg md:p-16 sm:p-8">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Catat Adjetiva</h2>
            <form action="{{ route('pencatatan.adjetiva.store') }}" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="nama_kontak"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Kontak </label>
                        <select id="nama_kontak" name="nama_kontak"
                            class="js-example-basic-single bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-1">
                            <option value="" disabled selected>Silahkan dipilih</option>
                            @foreach ($kontak as $kontaks)
                                <option value="{{ $kontaks->Nama_Kontak }}">
                                    {{ $kontaks->Nama_Kontak }}</option>
                            @endforeach
                        </select>
                        @error('nama_kontak')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="dari_akun" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dari
                            Akun</label>
                        <select id="dari_akun" name="dari_akun"
                            class="js-example-basic-single bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-1">
                            <option value="" disabled selected>Silahkan dipilih</option>
                            @foreach ($akun as $akuns)
                                <option value="{{ $akuns->id }}">
                                    {{ $akuns->Nama_Akun }}</option>
                            @endforeach
                        </select>
                        @error('dari_akun')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="ke_akun" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ke
                            Akun</label>
                        <select id="ke_akun" name="ke_akun"
                            class="js-example-basic-single bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-1">
                            <option value="" disabled selected>Silahkan dipilih</option>
                            @foreach ($akun as $akuns)
                                <option value="{{ $akuns->id }}">
                                    {{ $akuns->Nama_Akun }}</option>
                            @endforeach
                        </select>
                        @error('ke_akun')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="nominal_adjetiva"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nominal
                            Adjetiva</label>
                        <input type="number" name="nominal_adjetiva" id="nominal_adjetiva"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-400 focus:border-primary-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Nominal Transaksi" required="">
                        @error('nominal_adjetiva')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="tanggal_adjetiva"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Adjetiva</label>
                        <input type="date" name="tanggal_adjetiva" id="tanggal_adjetiva"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-400 focus:border-primary-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="" required="">
                        @error('tanggal_adjetiva')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="deskripsi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Deskripsi Transaksi"></textarea>
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex mt-4 items-center px-4 py-2 bg-sky-500 dark:bg-sky-500 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest shadow-sm hover:bg-emerald-400 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                    SUBMIT
                </button>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>

</x-app-layout>
