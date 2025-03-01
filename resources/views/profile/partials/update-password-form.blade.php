<section class="animate-fadeIn">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 transition duration-300">
            {{ __('Update Password') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 transition duration-300">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div>
            <x-input-label for="current_password" :value="__('Current Password')" class="transition duration-300" />
            <x-text-input id="current_password" name="current_password" type="password"
                class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 transition duration-150 transform hover:scale-105"
                autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <!-- New Password -->
        <div>
            <x-input-label for="password" :value="__('New Password')" class="transition duration-300" />
            <x-text-input id="password" name="password" type="password"
                class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 transition duration-150 transform hover:scale-105"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="transition duration-300" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 transition duration-150 transform hover:scale-105"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Save Button and Status Message -->
        <div class="flex items-center gap-4">
            <x-primary-button class="transition duration-300 transform hover:scale-105 active:scale-95">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400 transition duration-300">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>

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
