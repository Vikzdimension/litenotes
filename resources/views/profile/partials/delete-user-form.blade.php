<section class="space-y-6 animate-fadeIn">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 transition duration-300 hover:text-red-600">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 transition duration-300">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="transition duration-300 transform hover:scale-105 active:scale-95">{{ __('Delete Account') }}</x-danger-button>
</section>
