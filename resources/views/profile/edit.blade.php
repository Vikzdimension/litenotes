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
<x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="post" action="{{ route('profile.destroy') }}" class="p-6 space-y-4 animate-fadeIn">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 transition duration-300">
            {{ __('Are you sure you want to delete your account?') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 transition duration-300">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
        </p>

        <div class="mt-6">
            <x-input-label for="password" value="{{ __('Password') }}" class="sr-only transition duration-300" />

            <x-text-input id="password" name="password" type="password"
                class="mt-1 block w-3/4 border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 transition duration-150 transform hover:scale-105"
                placeholder="{{ __('Password') }}" />

            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
        </div>

        <div class="mt-6 flex justify-end gap-3">
            <!-- Cancel button now dispatches the 'close' event to close the modal -->
            <x-secondary-button x-on:click="$dispatch('close')"
                class="transition duration-300 transform hover:scale-105 active:scale-95">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3">
                {{ __('Delete Account') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>

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
