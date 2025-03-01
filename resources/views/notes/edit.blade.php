<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight transition duration-300 hover:text-indigo-600">
            {{ __('Edit Note') }}
        </h2>
    </x-slot>

    <div class="py-12 animate-fadeIn">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="my-6 p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 shadow-sm sm:rounded-lg transition transform hover:scale-105 hover:shadow-xl">
                <form action="{{ route('notes.update', $note) }}" method="post">
                    @method('put')
                    @csrf

                    <x-text-input type="text" name="title" :value="old('title', $note->title)" placeholder="Title"
                        class="w-full mb-4 border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 dark:focus:ring-indigo-600 transition duration-150"
                        autocomplete="off" />

                    @error('title')
                        <div class="text-red-600 text-sm mb-4">{{ $message }}</div>
                    @enderror

                    <x-textarea name="text" :value="old('text', $note->text)" placeholder="Start Typing Here..."
                        class="w-full h-64 resize-y mb-4 border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring focus:ring-indigo-500 dark:focus:ring-indigo-600 transition duration-150" />

                    @error('text')
                        <div class="text-red-600 text-sm mb-4">{{ $message }}</div>
                    @enderror

                    <x-primary-button class="mt-6 transition transform hover:scale-105 active:scale-95">
                        {{ __('Save Note') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.5s ease-in-out;
    }
</style>
