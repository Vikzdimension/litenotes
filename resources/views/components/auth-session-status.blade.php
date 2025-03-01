@props(['status'])

@if ($status)
    <div
        {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600 dark:text-green-400 px-4 py-2 rounded border border-green-200 dark:border-green-700 bg-green-50 dark:bg-green-900 transition-transform hover:scale-105 animate-fadeIn']) }}>
        {{ $status }}
    </div>
@endif
