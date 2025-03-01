@props(['value'])

<label
    {{ $attributes->merge([
        'class' =>
            'block font-medium text-sm text-gray-700 dark:text-gray-300 transition-colors duration-150 hover:text-indigo-600 dark:hover:text-indigo-400 cursor-pointer',
    ]) }}>
    {{ $value ?? $slot }}
</label>
