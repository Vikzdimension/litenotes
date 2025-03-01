<x-app-layout>
    <x-slot name="header">
        <div class="w-full bg-white dark:bg-gray-800 shadow px-6 py-4 transition duration-300">
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight hover:text-indigo-600 transition duration-300">
                {{ __('Profile') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 animate-fadeIn">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Update Profile Information Section -->
            <div
                class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg transition transform hover:scale-105 hover:shadow-xl">
                <div class="max-w-xl mx-auto">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password Section -->
            <div
                class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg transition transform hover:scale-105 hover:shadow-xl">
                <div class="max-w-xl mx-auto">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account Section -->
            <div
                class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg transition transform hover:scale-105 hover:shadow-xl">
                <div class="max-w-xl mx-auto">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.5s ease-in-out;
    }
</style>
