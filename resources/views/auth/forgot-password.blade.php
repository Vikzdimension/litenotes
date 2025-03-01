<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400 animate-fadeIn">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="animate-bounceIn">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')"
                class="hover:text-indigo-600 dark:hover:text-indigo-400 transition duration-300" />
            <x-text-input id="email"
                class="block mt-1 w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-300 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-400 focus:ring-opacity-50 transition duration-300"
                type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button
                class="bg-indigo-600 text-white hover:bg-indigo-500 dark:bg-indigo-700 dark:hover:bg-indigo-600 rounded-md py-2 px-4 transition duration-300">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

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
</style>
