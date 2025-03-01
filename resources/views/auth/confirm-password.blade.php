<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400 animate-fadeIn">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="animate-bounceIn">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')"
                class="hover:text-indigo-600 dark:hover:text-indigo-400 transition duration-300" />

            <x-text-input id="password"
                class="block mt-1 w-full border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-300 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-200 dark:focus:ring-indigo-400 focus:ring-opacity-50 transition duration-300"
                type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button
                class="bg-indigo-600 text-white hover:bg-indigo-500 dark:bg-indigo-700 dark:hover:bg-indigo-600 rounded-md py-2 px-4 transition duration-300">
                {{ __('Confirm') }}
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
