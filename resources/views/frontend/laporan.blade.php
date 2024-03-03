<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Laporan') }}
        </h2>
    </x-slot>

    <div class="container-fluid auto-rows-max m-10 p-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 sm:gap-4 gap-3">
        <a href="{{ route('laporan.bukubesar.index') }}" type="button">
            <div
                class="group relative cursor-pointer overflow-hidden bg-white dark:bg-gray-800 px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
                <span
                    class="absolute top-10 z-0 h-20 w-20 rounded-full bg-teal-800 transition-all duration-300 group-hover:scale-[15]"></span>
                <div class="relative z-10 mx-auto max-w-md">
                    <span
                        class="grid h-20 w-20 place-items-center rounded-full bg-teal-500 transition-all duration-300 group-hover:bg-teal-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-10 h-10 fill-white">
                            <path
                                d="M249.6 471.5c10.8 3.8 22.4-4.1 22.4-15.5V78.6c0-4.2-1.6-8.4-5-11C247.4 52 202.4 32 144 32C93.5 32 46.3 45.3 18.1 56.1C6.8 60.5 0 71.7 0 83.8V454.1c0 11.9 12.8 20.2 24.1 16.5C55.6 460.1 105.5 448 144 448c33.9 0 79 14 105.6 23.5zm76.8 0C353 462 398.1 448 432 448c38.5 0 88.4 12.1 119.9 22.6c11.3 3.8 24.1-4.6 24.1-16.5V83.8c0-12.1-6.8-23.3-18.1-27.6C529.7 45.3 482.5 32 432 32c-58.4 0-103.4 20-123 35.6c-3.3 2.6-5 6.8-5 11V456c0 11.4 11.7 19.3 22.4 15.5z" />
                        </svg>
                    </span>
                    <div
                        class="space-y-6 pt-5 text-base leading-7 text-gray-400 transition-all duration-300 group-hover:text-white/90">
                        <h1
                            class="text-2xl font-semibold leading-7 text-teal-500 dark:text-white sm:text-3xl sm:truncate">
                            Buku Besar</h1>
                    </div>
                    <div
                        class="space-y-6 pt-5 text-base leading-7 text-gray-500 dark:text-white transition-all duration-300 group-hover:text-white/90">
                        <p>Kumpulan seluruh transaksi per Akun
                        </p>
                    </div>
                </div>
            </div>
        </a>
    </div>
</x-app-layout>
