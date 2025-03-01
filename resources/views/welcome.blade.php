<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'LiteNotes') }}</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet" />
    <!-- Styles & Scripts -->
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

        @keyframes slideInUp {
            from {
                transform: translateY(100%);
            }

            to {
                transform: translateY(0);
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

        .animate-slideInUp {
            animation: slideInUp 1s ease-in-out;
        }

        .animate-bounceIn {
            animation: bounceIn 1s ease-in-out;
        }

        .hover-rotate {
            transition: transform 0.3s ease-in-out;
        }

        .hover-rotate:hover {
            transform: rotate(5deg);
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }

        .shadow-xl:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900">
    <!-- Navigation (Full Viewport Width) -->
    <header class="w-full bg-white dark:bg-gray-800 shadow dark:shadow-lg animate-fadeIn">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="hover-rotate">
                <x-application-logo class="w-16 h-16 fill-current text-gray-700 dark:text-gray-300" />
            </a>
            <div class="space-x-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('notes.index') }}"
                            class="text-sm text-gray-700 dark:text-gray-300 hover:underline hover:text-indigo-600 dark:hover:text-indigo-400 transition duration-300">Notes</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-sm text-gray-700 dark:text-gray-300 hover:underline hover:text-indigo-600 dark:hover:text-indigo-400 transition duration-300">Log
                            In</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="text-sm text-gray-700 dark:text-gray-300 hover:underline hover:text-indigo-600 dark:hover:text-indigo-400 transition duration-300">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </header>

    <!-- Main Content (Full Viewport Width) -->
    <main class="w-full">
        <!-- Hero Section -->
        <section class="bg-white dark:bg-gray-800 animate-fadeIn">
            <div class="max-w-7xl mx-auto px-6 py-12 text-center">
                <h1 class="text-5xl font-bold text-gray-800 dark:text-gray-100 animate-slideInUp">LiteNotes</h1>
                <p class="mt-4 text-xl text-gray-600 dark:text-gray-300">
                    A minimal and efficient note-taking app powered by Laravel &amp; Tailwind CSS.
                </p>
                <div class="mt-8">
                    @auth
                        <a href="{{ route('notes.index') }}"
                            class="px-8 py-3 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-500 transition duration-300 transform hover:scale-105">
                            My Notes
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-8 py-3 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-500 transition duration-300 transform hover:scale-105">
                            Log In to Get Started
                        </a>
                    @endauth
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-12 bg-gray-50 dark:bg-gray-900 animate-fadeIn">
            <div class="max-w-7xl mx-auto px-6">
                <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-100">Key Features</h2>
                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div
                        class="p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg hover:shadow-lg transition duration-300 transform hover:scale-105 animate-bounceIn">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Minimal Design</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-300">
                            A clean interface crafted to eliminate distractions and boost productivity.
                        </p>
                    </div>
                    <div
                        class="p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg hover:shadow-lg transition duration-300 transform hover:scale-105 animate-bounceIn">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Fast Performance</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-300">
                            Swift loading times and responsive interactions for a seamless experience.
                        </p>
                    </div>
                    <div
                        class="p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg hover:shadow-lg transition duration-300 transform hover:scale-105 animate-bounceIn">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Secure</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-300">
                            Built with Laravel, providing robust security and data protection.
                        </p>
                    </div>
                    <div
                        class="p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg hover:shadow-lg transition duration-300 transform hover:scale-105 animate-bounceIn">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Dark Mode</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-300">
                            Optimized for both light and dark environments without sacrificing clarity.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Technology Stack Section -->
        <section class="py-12 bg-white dark:bg-gray-800 animate-fadeIn">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Modern Technology Stack</h2>
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">
                    Built using Laravel Breeze for effortless authentication, Tailwind CSS for utility-first styling,
                    and Alpine.js for lightweight interactivity.
                </p>
            </div>
        </section>

        <!-- Call To Action Section -->
        <section class="py-12 bg-indigo-600 animate-fadeIn">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold text-white">Ready to Enhance Your Productivity?</h2>
                <p class="mt-4 text-white text-lg">
                    Dive into LiteNotes and experience the perfect balance of simplicity and functionality.
                </p>
                <div class="mt-8">
                    <a href="{{ route('notes.index') }}"
                        class="px-8 py-3 bg-white text-indigo-600 font-semibold rounded-md shadow-md hover:bg-gray-100 transition duration-300 transform hover:scale-105">
                        Get Started
                    </a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer (Full Viewport Width) -->
    <footer class="w-full bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 py-4 animate-fadeIn">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-sm text-gray-600 dark:text-gray-300">
                &copy; {{ date('Y') }} {{ config('app.name', 'LiteNotes') }}. All rights reserved.
            </p>
        </div>
    </footer>
</body>

</html>
