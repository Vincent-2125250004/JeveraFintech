<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Master') }}
        </h2>
    </x-slot>

    <div class="container-fluid auto-rows-max m-10 p-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 sm:gap-4 gap-3">
        <a href="{{ route('datamaster.akun.index') }}" type="button">
            <div
                class="group relative cursor-pointer overflow-hidden bg-gray-800 dark:bg-gray-800 px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
                <span
                    class="absolute top-10 z-0 h-20 w-20 rounded-full bg-sky-800 transition-all duration-300 group-hover:scale-[15]"></span>
                <div class="relative z-10 mx-auto max-w-md">
                    <span
                        class="grid h-20 w-20 place-items-center rounded-full bg-sky-500 transition-all duration-300 group-hover:bg-sky-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-10 h-10 fill-white">
                            <path
                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                        </svg>
                    </span>
                    <div
                        class="space-y-6 pt-5 text-base leading-7 text-gray-200 transition-all duration-300 group-hover:text-white/90">
                        <h1 class="text-2xl font-semibold leading-7 text-white dark:text-white sm:text-3xl sm:truncate">
                            Data Akun</h1>
                    </div>
                    <div
                        class="space-y-6 pt-5 text-base leading-7 text-gray-200 transition-all duration-300 group-hover:text-white/90">
                        <p>Kumpulan Akun transaksi, Anda bisa melakukan aksi seperti menambahkan akun, dan menyunting
                            Akun.
                        </p>
                    </div>
                </div>
            </div>
        </a>

        <a href="{{ route('datamaster.kontak.index') }}" type="button">
        <div
            class="flex group relative cursor-pointer overflow-hidden bg-gray-800 dark:bg-gray-800 px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
            <span
                class="absolute top-10 z-0 h-20 w-20 rounded-full bg-red-800 transition-all duration-300 group-hover:scale-[15]"></span>
            <div class="relative z-10 mx-auto max-w-md">
                <span
                    class="grid h-20 w-20 place-items-center rounded-full bg-red-500 transition-all duration-300 group-hover:bg-red-400">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-10 h-10 fill-white">
                        <path
                            d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                    </svg>
                </span>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-200 transition-all duration-300 group-hover:text-white/90">
                    <h1 class="text-2xl font-semibold leading-7 text-white dark:text-white sm:text-3xl sm:truncate">
                        Data Kontak</h1>
                </div>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-200 transition-all duration-300 group-hover:text-white/90">
                    <p>Kumpulan Kontak, Anda bisa melakukan aksi seperti menambahkan Kontak Pegawai, Vendor, Pelanggan,
                        dan menyuntingnya.</p>
                </div>

            </div>
        </div>
        </a>

        <a href="{{ route('datamaster.mobil.index') }}" type="button">
        <div
            class="group relative cursor-pointer overflow-hidden bg-gray-800 dark:bg-gray-800 px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
            <span
                class="absolute top-10 z-0 h-20 w-20 rounded-full bg-yellow-800 transition-all duration-300 group-hover:scale-[15]"></span>
            <div class="relative z-10 mx-auto max-w-md">
                <span
                    class="grid h-20 w-20 place-items-center rounded-full bg-yellow-500 transition-all duration-300 group-hover:bg-yellow-400">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-10 h-10 fill-white">
                        <path
                            d="M64 32C28.7 32 0 60.7 0 96V304v80 16c0 44.2 35.8 80 80 80c26.2 0 49.4-12.6 64-32c14.6 19.4 37.8 32 64 32c44.2 0 80-35.8 80-80c0-5.5-.6-10.8-1.6-16H416h33.6c-1 5.2-1.6 10.5-1.6 16c0 44.2 35.8 80 80 80s80-35.8 80-80c0-5.5-.6-10.8-1.6-16H608c17.7 0 32-14.3 32-32V288 272 261.7c0-9.2-3.2-18.2-9-25.3l-58.8-71.8c-10.6-13-26.5-20.5-43.3-20.5H480V96c0-35.3-28.7-64-64-64H64zM585 256H480V192h48.8c2.4 0 4.7 1.1 6.2 2.9L585 256zM528 368a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM176 400a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM80 368a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                    </svg>
                </span>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-200 transition-all duration-300 group-hover:text-white/90">
                    <h1 class="text-2xl font-semibold leading-7 text-white dark:text-white sm:text-3xl sm:truncate">
                        Data Mobil</h1>
                </div>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-200 transition-all duration-300 group-hover:text-white/90">
                    <p>Kumpulan Data Mobil, Anda bisa melakukan aksi seperti menambahkan Informasi, Berkas Mobil, dan
                        menyuntingnya.</p>
                </div>

            </div>
        </div>
        </a>
        <a href="{{ route('datamaster.rute.index') }}" type="button">
        <div
            class="group relative cursor-pointer overflow-hidden bg-gray-800 dark:bg-gray-800 px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
            <span
                class="absolute top-10 z-0 h-20 w-20 rounded-full bg-emerald-800 transition-all duration-300 group-hover:scale-[15]"></span>
            <div class="relative z-10 mx-auto max-w-md">
                <span
                    class="grid h-20 w-20 place-items-center rounded-full bg-emerald-500 transition-all duration-300 group-hover:bg-emerald-400">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-10 h-10 fill-white">
                        <path
                            d="M512 96c0 50.2-59.1 125.1-84.6 155c-3.8 4.4-9.4 6.1-14.5 5H320c-17.7 0-32 14.3-32 32s14.3 32 32 32h96c53 0 96 43 96 96s-43 96-96 96H139.6c8.7-9.9 19.3-22.6 30-36.8c6.3-8.4 12.8-17.6 19-27.2H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320c-53 0-96-43-96-96s43-96 96-96h39.8c-21-31.5-39.8-67.7-39.8-96c0-53 43-96 96-96s96 43 96 96zM117.1 489.1c-3.8 4.3-7.2 8.1-10.1 11.3l-1.8 2-.2-.2c-6 4.6-14.6 4-20-1.8C59.8 473 0 402.5 0 352c0-53 43-96 96-96s96 43 96 96c0 30-21.1 67-43.5 97.9c-10.7 14.7-21.7 28-30.8 38.5l-.6 .7zM128 352a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM416 128a32 32 0 1 0 0-64 32 32 0 1 0 0 64z" />
                    </svg>
                </span>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-200 transition-all duration-300 group-hover:text-white/90">
                    <h1 class="text-2xl font-semibold leading-7 text-white dark:text-white sm:text-3xl sm:truncate">
                        Data Rute</h1>
                </div>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-200 transition-all duration-300 group-hover:text-white/90">
                    <p>Kumpulan Data Mobil, Anda bisa melakukan aksi seperti menambahkan Informasi, Berkas Mobil, dan
                        menyuntingnya.</p>
                </div>
            </div>
        </div>
        </a>
    </div>
</x-app-layout>
