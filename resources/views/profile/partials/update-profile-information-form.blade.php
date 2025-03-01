@php
    // Ensure $user is defined if not passed explicitly.
    $user = $user ?? Auth::user();
@endphp

<section class="animate-fadeIn">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 transition duration-300">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 transition duration-300">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <!-- Form for Resending Verification Email -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Update Profile Information Form -->
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="transition duration-300" />
            <x-text-input id="name" name="name" type="text"
                class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 transition duration-150"
                :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="transition duration-300" />
            <x-text-input id="email" name="email" type="email"
                class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 transition duration-150"
                :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200 transition duration-300">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 transition duration-300">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400 transition duration-300">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="transition duration-300">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400 transition duration-300">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>

<style>
    /* Fade in and slide down from 20px above */
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
