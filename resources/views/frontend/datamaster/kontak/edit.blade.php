<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md text-gray-800 leading-tight text-white">
            {{ __('Data Master/Data Kontak/Edit Kontak') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('datamaster.akun.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                    Data Kontak
                </a>
            </div>

            <div class="relative overflow-x-auto">
                <div class="bg-gray-700 rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-gray-100">
                            <p class="font-medium text-lg">Edit Kontak</p>
                            <p>Mohon pastikan semua form telah terisi dengan lengkap.</p>
                        </div>

                        <div class="lg:col-span-2">
                            <form method="POST" action="{{ route('datamaster.kontak.update', $kontak->Kode_Kontak) }}">
                                @method('PUT')
                                @csrf
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-3">
                                    <div class="md:col-span-3">
                                        <label for="nama_kontak" class="text-gray-100">Nama Kontak</label>
                                        <input type="text" name="nama_kontak" id="nama_kontak"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-100"
                                            value="{{ $kontak->Nama_Kontak }}" />
                                        @error('nama_akun')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="nomor_telepon" class="text-gray-100">Nomor Telepon</label>
                                        <input type="text" name="nomor_telepon" id="nomor_telepon"
                                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-100"
                                            value="{{ $kontak->Nomor_Telepon }}" placeholder="" />
                                        @error('kategori_akun')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="tipe_kontak" class="text-gray-100">Tipe Kontak</label>
                                        <div class="mt-1">
                                            <select id="tipe_kontak" name="tipe_kontak" class="bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @foreach (App\Enums\TipeKontak::cases() as $TipeKontaks)
                                                    <option value="{{ $TipeKontaks->value }}"
                                                        @selected($kontak->Tipe_Kontak->value == $TipeKontaks->value)>{{ $TipeKontaks->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('tipe_transaksi')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-5 text-right mt-10">
                                        <div class="inline-flex items-end">
                                            <button type="submit"
                                                class="inline-flex items-center px-4 py-2 bg-sky-500 dark:bg-sky-500 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest shadow-sm hover:bg-emerald-600 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">Store</button>
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
