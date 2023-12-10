<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased dark">


    <div class="min-h-screen bg-gray-900">
        @livewire('navigation-menu')

        <div class="flex">
            <!-- Page Heading -->
            @livewire('sidebar')

            <!-- Page Content -->
            <main class="flex-1 ">
                <section class="px-5 mx-auto min-h-screen inset-x-24">
                    {{ $slot }}
                </section>


                <footer class="footer footer-center w-full p-4 mt-10 bg-slate-800 text-white">
                    <div class="flex justify-between">
                        <p>
                            Copyright © 2023 -
                            <a class="font-semibold" href="mailto:danny@heijnen-developing.nl">Danny Heijnen</a>
                        </p>
                        <p>
                            Design & Developed by
                            <a class="font-semibold" href="mailto:danny@heijnen-developing.nl">Heijnen Developing</a>
                        </p>
                    </div>
                </footer>
            </main>
        </div>
    </div>

            @stack('modals')

        @livewireScripts
</body>

</html>
