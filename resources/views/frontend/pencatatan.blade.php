<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pencatatan') }}
        </h2>
    </x-slot>

    <div class="container-fluid auto-rows-max m-10 p-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 sm:gap-4 gap-3">
        <div
            class="group relative cursor-pointer overflow-hidden bg-gray-800 dark:bg-gray-800 px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
            <span
                class="absolute top-10 z-0 h-20 w-20 rounded-full bg-violet-800 transition-all duration-300 group-hover:scale-[15]"></span>
            <div class="relative z-10 mx-auto max-w-md">
                <span
                    class="grid h-20 w-20 place-items-center rounded-full bg-violet-500 transition-all duration-300 group-hover:bg-violet-400">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-10 h-10 fill-white">
                        <path
                            d="M535 41c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l64 64c4.5 4.5 7 10.6 7 17s-2.5 12.5-7 17l-64 64c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l23-23L384 112c-13.3 0-24-10.7-24-24s10.7-24 24-24l174.1 0L535 41zM105 377l-23 23L256 400c13.3 0 24 10.7 24 24s-10.7 24-24 24L81.9 448l23 23c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L7 441c-4.5-4.5-7-10.6-7-17s2.5-12.5 7-17l64-64c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9zM96 64H337.9c-3.7 7.2-5.9 15.3-5.9 24c0 28.7 23.3 52 52 52l117.4 0c-4 17 .6 35.5 13.8 48.8c20.3 20.3 53.2 20.3 73.5 0L608 169.5V384c0 35.3-28.7 64-64 64H302.1c3.7-7.2 5.9-15.3 5.9-24c0-28.7-23.3-52-52-52l-117.4 0c4-17-.6-35.5-13.8-48.8c-20.3-20.3-53.2-20.3-73.5 0L32 342.5V128c0-35.3 28.7-64 64-64zm64 64H96v64c35.3 0 64-28.7 64-64zM544 320c-35.3 0-64 28.7-64 64h64V320zM320 352a96 96 0 1 0 0-192 96 96 0 1 0 0 192z" />
                    </svg>
                </span>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-200 transition-all duration-300 group-hover:text-white/90">
                    <h1 class="text-2xl font-semibold leading-7 text-white dark:text-white sm:text-3xl sm:truncate">
                        Pengeluaran</h1>
                </div>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-200 transition-all duration-300 group-hover:text-white/90">
                    <p>Catat semua kejadian Transaksi pengeluaran kas perusahaan dari berbagai akun.</p>
                </div>

            </div>
        </div>

        <div
            class="group relative cursor-pointer overflow-hidden bg-gray-800 dark:bg-gray-800 px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
            <span
                class="absolute top-10 z-0 h-20 w-20 rounded-full bg-pink-800 transition-all duration-300 group-hover:scale-[15]"></span>
            <div class="relative z-10 mx-auto max-w-md">
                <span
                    class="grid h-20 w-20 place-items-center rounded-full bg-pink-500 transition-all duration-300 group-hover:bg-pink-400">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-10 h-10 fill-white">
                        <path
                            d="M312 24V34.5c6.4 1.2 12.6 2.7 18.2 4.2c12.8 3.4 20.4 16.6 17 29.4s-16.6 20.4-29.4 17c-10.9-2.9-21.1-4.9-30.2-5c-7.3-.1-14.7 1.7-19.4 4.4c-2.1 1.3-3.1 2.4-3.5 3c-.3 .5-.7 1.2-.7 2.8c0 .3 0 .5 0 .6c.2 .2 .9 1.2 3.3 2.6c5.8 3.5 14.4 6.2 27.4 10.1l.9 .3c11.1 3.3 25.9 7.8 37.9 15.3c13.7 8.6 26.1 22.9 26.4 44.9c.3 22.5-11.4 38.9-26.7 48.5c-6.7 4.1-13.9 7-21.3 8.8V232c0 13.3-10.7 24-24 24s-24-10.7-24-24V220.6c-9.5-2.3-18.2-5.3-25.6-7.8c-2.1-.7-4.1-1.4-6-2c-12.6-4.2-19.4-17.8-15.2-30.4s17.8-19.4 30.4-15.2c2.6 .9 5 1.7 7.3 2.5c13.6 4.6 23.4 7.9 33.9 8.3c8 .3 15.1-1.6 19.2-4.1c1.9-1.2 2.8-2.2 3.2-2.9c.4-.6 .9-1.8 .8-4.1l0-.2c0-1 0-2.1-4-4.6c-5.7-3.6-14.3-6.4-27.1-10.3l-1.9-.6c-10.8-3.2-25-7.5-36.4-14.4c-13.5-8.1-26.5-22-26.6-44.1c-.1-22.9 12.9-38.6 27.7-47.4c6.4-3.8 13.3-6.4 20.2-8.2V24c0-13.3 10.7-24 24-24s24 10.7 24 24zM568.2 336.3c13.1 17.8 9.3 42.8-8.5 55.9L433.1 485.5c-23.4 17.2-51.6 26.5-80.7 26.5H192 32c-17.7 0-32-14.3-32-32V416c0-17.7 14.3-32 32-32H68.8l44.9-36c22.7-18.2 50.9-28 80-28H272h16 64c17.7 0 32 14.3 32 32s-14.3 32-32 32H288 272c-8.8 0-16 7.2-16 16s7.2 16 16 16H392.6l119.7-88.2c17.8-13.1 42.8-9.3 55.9 8.5zM193.6 384l0 0-.9 0c.3 0 .6 0 .9 0z" />
                    </svg>
                </span>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-200 transition-all duration-300 group-hover:text-white/90">
                    <h1 class="text-2xl font-semibold leading-7 text-white dark:text-white sm:text-3xl sm:truncate">
                        Pemasukan</h1>
                </div>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-200 transition-all duration-300 group-hover:text-white/90">
                    <p>Catat semua kejadian Transaksi pemasukan kas perusahaan dari berbagai akun.</p>
                </div>

            </div>
        </div>

        <a href="{{ route('pencatatan.do.index') }}" type="button">
        <div
            class="group relative cursor-pointer overflow-hidden bg-gray-800 dark:bg-gray-800 px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl sm:mx-auto sm:max-w-sm sm:rounded-lg sm:px-10">
            <span
                class="absolute top-10 z-0 h-20 w-20 rounded-full bg-lime-800 transition-all duration-300 group-hover:scale-[15]"></span>
            <div class="relative z-10 mx-auto max-w-md">
                <span
                    class="grid h-20 w-20 place-items-center rounded-full bg-lime-500 transition-all duration-300 group-hover:bg-lime-400">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 512" class="w-10 h-10 fill-white">
                        <path
                            d="M640 0V400c0 61.9-50.1 112-112 112c-61 0-110.5-48.7-112-109.3L48.4 502.9c-17.1 4.6-34.6-5.4-39.3-22.5s5.4-34.6 22.5-39.3L352 353.8V64c0-35.3 28.7-64 64-64H640zM576 400a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM23.1 207.7c-4.6-17.1 5.6-34.6 22.6-39.2l46.4-12.4 20.7 77.3c2.3 8.5 11.1 13.6 19.6 11.3l30.9-8.3c8.5-2.3 13.6-11.1 11.3-19.6l-20.7-77.3 46.4-12.4c17.1-4.6 34.6 5.6 39.2 22.6l41.4 154.5c4.6 17.1-5.6 34.6-22.6 39.2L103.7 384.9c-17.1 4.6-34.6-5.6-39.2-22.6L23.1 207.7z" />
                    </svg>
                </span>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-200 transition-all duration-300 group-hover:text-white/90">
                    <h1 class="text-2xl font-semibold leading-7 text-white dark:text-white sm:text-3xl sm:truncate">
                        Delivery Order</h1>
                </div>
                <div
                    class="space-y-6 pt-5 text-base leading-7 text-gray-200 transition-all duration-300 group-hover:text-white/90">
                    <p>Kontrol semua berkas Delivery Order didalam satu sistem</p>
                </div>

            </div>
        </div>
        </a>
    </div>
</x-app-layout>
