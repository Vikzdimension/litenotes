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

    <style>
        /* Custom Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes bounceIn {
            from {
                transform: scale(0.5);
            }

            to {
                transform: scale(1);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 1s ease-in-out;
        }

        .animate-bounceIn {
            animation: bounceIn 1s ease-in-out;
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }

        .shadow-xl:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased bg-gray-100 dark:bg-gray-900">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 animate-fadeIn">
        <div class="animate-bounceIn">
            <a href="/" class="hover-scale">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg hover:shadow-xl transition duration-300">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
