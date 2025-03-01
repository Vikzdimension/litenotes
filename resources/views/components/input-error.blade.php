@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 space-y-1 animate-fadeIn']) }}>
        @foreach ((array) $messages as $message)
            <li class="transition duration-150 transform hover:scale-105">{{ $message }}</li>
        @endforeach
    </ul>
@endif

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
