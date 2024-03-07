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

    <!-- Scripts -->
    @vite('resources/js/app.js')

</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"
        style="background-image: url('https://images.pexels.com/photos/2101137/pexels-photo-2101137.jpeg'); background-size:cover; ">
        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; ">
            <a href="/" style="text-align: center; display: flex; align-items: center;">
                <x-application-logo class="w-40 h-40 fill-current text-gray-500" style="filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, 1));"/>
                <h2 class="italic text-4xl text-white dark:text-black font-semibold uppercase tracking-tighter" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 1); margin-left: 2px;">Jevera Fintech</h2>
            </a>
        </div>
        <div
            class="display-flex w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-600 text-black dark:text-white shadow-md overflow-hidden sm:rounded-lg ">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
