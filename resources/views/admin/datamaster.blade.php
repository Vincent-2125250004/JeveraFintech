<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Master') }}
        </h2>
    </x-slot>

    <div class="container-fluid auto-rows-max m-10 p-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 sm:gap-4 gap-3">
        <div
            class="group relative cursor-pointer overflow-hidden bg-gray-800 dark:bg-gray-800 px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
            <span
                class="absolute top-10 z-0 h-20 w-20 rounded-full bg-sky-800 transition-all duration-300 group-hover:scale-[15]"></span>
            <div class="relative z-10 mx-auto max-w-md">
                <span
                    class="grid h-20 w-20 place-items-center rounded-full bg-sky-500 transition-all duration-300 group-hover:bg-sky-400">
                    @svg('gmdi-account-box-r', 'w-12 h-12 text-white dark:text-white mx-auto')
                </span>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-200 transition-all duration-300 group-hover:text-white/90">
                    <h1 class="text-2xl font-semibold leading-7 text-white dark:text-white sm:text-3xl sm:truncate">
                        Data Akun</h1>
                </div>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-200 transition-all duration-300 group-hover:text-white/90">
                    <p>Kumpulan Akun transaksi, Anda bisa melakukan aksi seperti menambahkan akun, dan menyunting Akun.</p>
                </div>
            </div>
        </div>
        <div
            class="flex group relative cursor-pointer overflow-hidden bg-gray-800 dark:bg-gray-800 px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
            <span
                class="absolute top-10 z-0 h-20 w-20 rounded-full bg-red-800 transition-all duration-300 group-hover:scale-[15]"></span>
            <div class="relative z-10 mx-auto max-w-md">
                <span
                    class="grid h-20 w-20 place-items-center rounded-full bg-red-500 transition-all duration-300 group-hover:bg-red-400">
                    @svg('gmdi-supervisor-account-r', 'w-12 h-12 text-white dark:text-white mx-auto')
                </span>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-200 transition-all duration-300 group-hover:text-white/90">
                    <h1 class="text-2xl font-semibold leading-7 text-white dark:text-white sm:text-3xl sm:truncate">
                        Data Kontak</h1>
                </div>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-200 transition-all duration-300 group-hover:text-white/90">
                    <p>Kumpulan Kontak, Anda bisa melakukan aksi seperti menambahkan Kontak Pegawai, Vendor, Pelanggan, dan menyuntingnya.</p>
                </div>
                
            </div>
        </div>

        <div
            class="group relative cursor-pointer overflow-hidden bg-gray-800 dark:bg-gray-800 px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
            <span
                class="absolute top-10 z-0 h-20 w-20 rounded-full bg-yellow-800 transition-all duration-300 group-hover:scale-[15]"></span>
            <div class="relative z-10 mx-auto max-w-md">
                <span
                    class="grid h-20 w-20 place-items-center rounded-full bg-yellow-500 transition-all duration-300 group-hover:bg-yellow-400">
                    @svg('mdi-car-lifted-pickup', 'w-12 h-12 text-white dark:text-white mx-auto')
                </span>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-200 transition-all duration-300 group-hover:text-white/90">
                    <h1 class="text-2xl font-semibold leading-7 text-white dark:text-white sm:text-3xl sm:truncate">
                        Data Mobil</h1>
                </div>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-200 transition-all duration-300 group-hover:text-white/90">
                    <p>Kumpulan Data Mobil, Anda bisa melakukan aksi seperti menambahkan Informasi, Berkas Mobil, dan menyuntingnya.</p>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>