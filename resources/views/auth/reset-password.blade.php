<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}" class="animate-bounceIn">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')"
                class="hover:text-indigo-600 dark:hover:text-indigo-400 transition duration-300" />
            <x-text-input id="email"
                class="block mt-1 w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-300 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-400 focus:ring-opacity-50 transition duration-300"
                type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')"
                class="hover:text-indigo-600 dark:hover:text-indigo-400 transition duration-300" />
            <x-text-input id="password"
                class="block mt-1 w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-300 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-400 focus:ring-opacity-50 transition duration-300"
                type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')"
                class="hover:text-indigo-600 dark:hover:text-indigo-400 transition duration-300" />
            <x-text-input id="password_confirmation"
                class="block mt-1 w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-300 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-400 focus:ring-opacity-50 transition duration-300"
                type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button
                class="bg-indigo-600 text-white hover:bg-indigo-500 dark:bg-indigo-700 dark:hover:bg-indigo-600 rounded-md py-2 px-4 transition duration-300">
                {{ __('Reset Password') }}
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
