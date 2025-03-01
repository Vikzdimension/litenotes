<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight transition duration-300 hover:text-indigo-600">
            {{ !$note->trashed() ? __('Notes') : __('Trash') }}
        </h2>
    </x-slot>

    <div class="py-12 animate-fadeIn">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('success'))
                <div
                    class="mb-4 px-4 py-2 bg-green-100 border border-green-200 text-green-700 rounded-md shadow transition duration-300 hover:shadow-xl">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex flex-wrap items-center justify-between transition duration-300">
                @if (!$note->trashed())
                    <div class="flex items-center space-x-4">
                        <p class="opacity-70 px-4 transition duration-300 hover:text-indigo-600">
                            <strong>Created:</strong> {{ $note->created_at->diffForHumans() }}
                        </p>
                        <p class="opacity-70 px-4 transition duration-300 hover:text-indigo-600">
                            <strong>Updated:</strong> {{ $note->updated_at->diffForHumans() }}
                        </p>
                    </div>
                    <div class="flex items-center space-x-4 ml-auto">
                        <a href="{{ route('notes.edit', $note) }}"
                            class="btn-link transition duration-300 transform hover:scale-105">
                            Edit Note
                        </a>
                        <form action="{{ route('notes.destroy', $note) }}" method="post"
                            onsubmit="return confirm('Are you sure you wish to move this note to trash?');">
                            @method('delete')
                            @csrf
                            <button type="submit"
                                class="btn btn-danger transition duration-300 transform hover:scale-105">
                                Move to Trash
                            </button>
                        </form>
                    </div>
                @else
                    <div class="flex items-center space-x-4">
                        <p class="opacity-70 px-4 transition duration-300 hover:text-indigo-600">
                            <strong>Deleted:</strong> {{ $note->deleted_at->diffForHumans() }}
                        </p>
                    </div>
                    <div class="flex items-center space-x-4 ml-auto">
                        <form action="{{ route('trashed.update', $note) }}" method="post"
                            class="transition duration-300 transform hover:scale-105">
                            @method('put')
                            @csrf
                            <button type="submit" class="btn-link">
                                Restore Note
                            </button>
                        </form>
                        <form action="{{ route('trashed.destroy', $note) }}" method="post"
                            onsubmit="return confirm('Are you sure you wish to delete this note forever? This action cannot be undone.');">
                            @method('delete')
                            @csrf
                            <button type="submit"
                                class="btn btn-danger transition duration-300 transform hover:scale-105">
                                Delete Forever
                            </button>
                        </form>
                    </div>
                @endif
            </div>

            <div
                class="my-6 p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 shadow-sm sm:rounded-lg transition transform hover:scale-105 hover:shadow-xl">
                <h2 class="font-bold text-4xl transition duration-300 hover:text-indigo-600">
                    {{ $note->title }}
                </h2>
                <p class="mt-6 whitespace-pre-wrap text-gray-800 dark:text-gray-100 transition duration-300">
                    {{ $note->text }}
                </p>
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
