<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md text-gray-800 leading-tight text-white">
            {{ __('Data Master/Data Mobil/Tambah Mobil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('datamaster.mobil.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                    Data Mobil
                </a>
            </div>

    
            <div class="relative overflow-x-auto">
                <div class="bg-gray-700 rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-gray-100">
                            <p class="font-medium text-lg">Tambah Mobil</p>
                            <p>Mohon pastikan semua form telah terisi dengan lengkap.</p>
                        </div>

                        <div class="lg:col-span-2">
                            <form method="POST" action="{{ route('datamaster.mobil.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                                    <div class="md:col-span-3">
                                        <label for="nomor_polisi" class="text-gray-100">Nomor Polisi</label>
                                        <input type="text" name="nomor_polisi" id="nomor_polisi"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-100" value="" />
                                        @error('nomor_polisi')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="nomor_lambung" class="text-gray-100">Nomor Lambung</label>
                                        <input type="text" name="nomor_lambung" id="nomor_lambung"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-100" value=""
                                            placeholder="" />
                                        @error('nomor_lambung')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="pemilik" class="text-gray-100">Pemilik</label>
                                        <input type="text" name="pemilik" id="pemilik"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-100" value=""
                                            placeholder="" />
                                        @error('pemilik')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="nomor_seri" class="text-gray-100">Nomor Seri</label>
                                        <input type="text" name="nomor_seri" id="nomor_seri"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-100" value=""
                                            placeholder="" />
                                        @error('nomor_seri')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="nomor_rangka" class="text-gray-100">Nomor Rangka</label>
                                        <input type="text" name="nomor_rangka" id="nomor_rangka"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-100" value=""
                                            placeholder="" />
                                        @error('nomor_rangka')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="nomor_mesin" class="text-gray-100">Nomor Mesin</label>
                                        <input type="text" name="nomor_mesin" id="nomor_mesin"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-100" value=""
                                            placeholder="" />
                                        @error('nomor_mesin')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="tanggal_masuk" class="text-gray-100">Tanggal Masuk</label>
                                        <input type="date" name="tanggal_masuk" id="tanggal_masuk"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-100" value=""
                                            placeholder="" />
                                        @error('tanggal_masuk')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="tanggal_keluar" class="text-gray-100">Tanggal Keluar</label>
                                        <input type="text" name="tanggal_keluar" id="tanggal_keluar"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-100" value=""
                                            placeholder="- Jika belum keluar" />
                                        @error('tanggal_keluar')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="md:col-span-3">
                                        <label for="image" class="text-gray-100">Berkas Pendukung</label>
                                        <input type="file" name="images[]" id="image" accept="image/*" multiple
                                            class="block w-full text-md text-gray-200 mt-2
                                            border border-gray-400 shadow-sm rounded-lg
                                            file:me-4 file:py-2 file:px-4
                                            file:rounded-lg file:border-0
                                            file:text-md file:font-semibold
                                            file:bg-gray-600 file:text-white
                                            hover:file:bg-blue-700
                                            file:disabled:opacity-50 file:disabled:pointer-events-none
                                            dark:file:bg-gray-500
                                            dark:hover:file:bg-gray-400"
                                            value="" placeholder="" />
                                        @error('image')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-6 text-right mt-10">
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
