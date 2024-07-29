<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
            <div class="mb-4 px-4 py-2 bg-red-100 border border-red-200 text-red-700 rounded-md">
                {{ session('success') }}
            </div>
            @endsession
            @endif
            <a href="{{ route('notes.create') }}" class="btn-link btn-lg mb-2">+ New Note</a>
            @forelse ($notes as $note)
                <div class="my6 p-6 bg-white border-b border-grey-200 shadow-sm sm:rounded-lg">
                    <h1 class="font-bold text-2xl">
                        <a href="{{ route('notes.show',$note) }}">{{ $note->title }}</a>
                    </h1>
                    <p class="mt-2">
                        {{  Str::limit($note->text, 200) }}
                    </p>
                    <span class="block mt-4 text-sm opacity-70">{{ $note->updated_at->diffForHumans() }}</span>
                </div>
            @empty
            <p>You have no notes yet. </p>
            @endforelse

            {{ $notes->links() }}
        </div>
    </div>
</x-app-layout>
