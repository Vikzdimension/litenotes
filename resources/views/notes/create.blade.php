<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Note') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="my6 p-6 bg-white border-b border-grey-200 shadow-sm sm:rounded-lg">
                    <form action="{{ route('notes.store') }}" method="post">
                        @csrf
                        <x-text-input type="text" name="title" :value="@old('title')" placeholder="Title" class="w-full" autocomplete="off"></x-text-input>
                        @error('title')
                            <div class="text-red-600 text-sm">{{ $message }} </div>
                        @enderror
                        <x-textarea name="text"  :value="@old('text')" placeholder="Start Typing Here..." class="w-full"></x-textarea>
                        @error('text')
                            <div class="text-red-600 text-sm">{{ $message }} </div>
                        @enderror
                        <x-primary-button class="mt-6">Save Note</x-primary-button>
                    </form>
                </div>
        </div>
    </div>
        </div>
    </div>
</x-app-layout>
