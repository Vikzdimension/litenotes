<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ !$note->trashed() ? __('Notes') : __('Trash') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
            <div class="mb-4 px-4 py-2 bg-green-100 border border-green-200 text-green-700 rounded-md">
                {{ session('success') }}
            </div>

            @endif
            <div class="flex">
                @if (!$note->trashed())
                    <p class="opacity-70 px-4">
                        <strong>Created:</strong>{{ $note->created_at->diffForHumans() }}
                    </p>
                    <p class="opacity-70 px-4">
                        <strong>Updated:</strong>{{ $note->updated_at->diffForHumans() }}
                    </p>
                    <a href="{{ route('notes.edit', $note) }}" class="btn-link ml-auto">Edit Note</a>
                    <form action="{{ route('notes.destroy', $note) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('are you sure you wish to move this note to trash')">Move to Trash</button>

                    </form>
                @else
                    <p class="opacity-70 px-4">
                        <strong>Deleted:</strong>{{ $note->deleted_at->diffForHumans() }}
                    </p>
                    <form action="{{ route('trashed.update', $note) }}" method="post" class="ml-auto">
                    @method('put')
                    @csrf
                    <button type="submit" class="btn-link">Restore Note</button>
                    </form>
                    <form action="{{ route('trashed.destroy', $note) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('are you sure you wish to delete this note forever, This action can not be undone')">Delete Forever</button>
                    </form>
                @endif
            </div>
                <div class="my6 p-6 bg-white border-b border-grey-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-4xl">
                        {{ $note->title }}
                    </h2>
                    <p class="mt-6 whitespace-pre-wrap">{{  $note->text }}</p>
                </div>
        </div>
    </div>
</x-app-layout>
