<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Montserrat:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.tailwindcss.min.css">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div
        class="min-h-screen bg-gray-100 dark:bg-gray-800 pattern-topography-gray-500/100 pattern-topography-scale-[0.2] flex flex-col">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.tailwindcss.min.js"></script>
        <script>
            $(document).ready(function() {
                let table =  $('#myTable').DataTable();
                $('#myTable_wrapper').addClass('overflow-y-hidden p-1');
                $('#myTable_filter').addClass('text-white dark:text-white');
                $('#myTable_filter input').addClass(
                    'dark:text-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md px-2 py-1 ms-4'
                );
                $('#myTable_length').addClass('text-white dark:text-white');
                $('#myTable_length select').addClass(
                    'dark:text-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md px-6 py-1 ms-4'
                );
                $('#myTable_info').addClass('text-white dark:text-white text-sm');
                $('#myTable_paginate').addClass('text-white dark:text-white mt-4');
                $('#myTable_next').addClass('text-white dark:text-white ms-4');
                $('#myTable_previous').addClass('text-white dark:text-white me-4');

            });
        </script>
    </div>


    <footer class="max-w-screen dark:bg-gray-900">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="#" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <x-application-logo class="block h-8 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Jevera
                        Team</span>
                </a>
                <ul
                    class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">About</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">&copy; {{ date('Y') }} <a
                    href="#" class="hover:underline">Jevera Fintech™</a>. All Rights Reserved.</span>
        </div>
    </footer>

</body>

</html>
