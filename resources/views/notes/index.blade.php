<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight transition duration-300 hover:text-indigo-600">
            {{ request()->routeIs('notes.index') ? __('Notes') : __('Trash') }}
        </h2>
    </x-slot>

    <div class="py-12 animate-fadeIn">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 px-4 py-2 bg-red-100 border border-red-200 text-red-700 rounded-md animate-fadeIn">
                    {{ session('success') }}
                </div>
            @endif

            @if (request()->routeIs('notes.index'))
                <a href="{{ route('notes.create') }}"
                    class="inline-block mb-2 px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-500 transition transform duration-300 hover:scale-105">
                    + New Note
                </a>
            @endif

            @forelse ($notes as $note)
                <a @if (request()->routeIs('notes.index')) href="{{ route('notes.show', $note) }}"
                    @else
                        href="{{ route('trashed.show', $note) }}" @endif
                    class="block my-6 p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 shadow-sm sm:rounded-lg transition transform duration-300 hover:scale-105 hover:shadow-xl cursor-pointer">
                    <h1
                        class="font-bold text-2xl mb-2 text-gray-800 dark:text-gray-100 transition duration-300 hover:text-indigo-600">
                        {{ $note->title }}
                    </h1>
                    <p class="mt-2 text-gray-700 dark:text-gray-300">
                        {{ Str::limit($note->text, 200) }}
                    </p>
                    <span class="block mt-4 text-sm opacity-70 text-gray-600 dark:text-gray-400">
                        {{ $note->updated_at->diffForHumans() }}
                    </span>
                </a>
            @empty
                @if (request()->routeIs('notes.index'))
                    <p class="text-center text-gray-600 dark:text-gray-400">You have no notes yet.</p>
                @else
                    <p class="text-center text-gray-600 dark:text-gray-400">No items in the trash.</p>
                @endif
            @endforelse

            {{ $notes->links() }}
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
