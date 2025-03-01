<a
    {{ $attributes->merge(['class' => 'block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 dark:text-gray-300 transition duration-150 ease-in-out transform hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 hover:scale-105 active:scale-95 hover:shadow-md']) }}>
    {{ $slot }}
</a>
