<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md text-gray-800 leading-tight dark:text-white">
            {{ __('Data Master/Data Rute/Tambah Rute') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('datamaster.rute.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                    Data Rute
                </a>
            </div>

            <div class="relative overflow-x-auto">
                <div class="bg-white dark:bg-gray-700 rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-black dark:text-white">
                            <p class="font-medium text-lg">Tambah Rute</p>
                            <p>Mohon pastikan semua form telah terisi dengan lengkap.</p>
                        </div>

                        <div class="lg:col-span-2">
                            <form method="POST" action="{{ route('datamaster.rute.store') }}">
                                @csrf
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-2">
                                    <div class="md:col-span-3">
                                        <label for="asal_rute" class="text-black dark:text-white">Rute Asal</label>
                                        <input type="text" name="asal_rute" id="asal_rute"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-400 focus:border-primary-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="" required="" placeholder="Rute Asal" />
                                        @error('asal_rute')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="tujuan_rute" class="text-black dark:text-white">Rute Tujuan</label>
                                        <input type="text" name="tujuan_rute" id="tujuan_rute"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-400 focus:border-primary-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="" required="" placeholder="Rute Tujuan" />
                                        @error('tujuan_rute')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="gerbang" class="text-black dark:text-white">Gerbang</label>
                                        <input type="text" name="gerbang" id="gerbang"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-400 focus:border-primary-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="" required="" placeholder="Gerbang" />
                                        @error('gerbang')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="kilometer_rute" class="text-black dark:text-white">Kilometer
                                            Rute</label>
                                        <input type="text" name="kilometer_rute" id="kilometer_rute"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-400 focus:border-primary-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="" required="" placeholder="Kilometer" />
                                        @error('kilometer_rute')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="harga_tonase" class="text-black dark:text-white">Harga Per Tonase</label>
                                        <input type="number" name="harga_tonase" id="harga_tonase"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-400 focus:border-primary-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="" required="" placeholder="Harga" />
                                        @error('harga_tonase')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="uang_jalan" class="text-black dark:text-white">Uang Jalan</label>
                                        <input type="number" name="uang_jalan" id="uang_jalan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-400 focus:border-primary-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            value="" required="" placeholder="Harga" />
                                        @error('uang_jalan')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-5 text-right mt-10">
                                        <div class="inline-flex items-end">
                                            <button type="submit"
                                                class="inline-flex items-center px-4 py-2 bg-sky-500 dark:bg-sky-500 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest shadow-sm hover:bg-emerald-600 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">Submit</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
