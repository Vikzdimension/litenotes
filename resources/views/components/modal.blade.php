<!-- resources/views/components/modal.blade.php -->
<div x-teleport="body">
    <div x-data="{ open: false }" x-show="open" x-on:click.outside="open = false" x-on:keydown.escape.window="open = false"
        class="fixed inset-0 z-50 overflow-y-auto px-4 py-6 sm:px-0" style="display: none;"
        x-on:open-modal.window="if($event.detail === '{{ $name }}'){ open = true } else { open = false }">
        <!-- Modal Overlay -->
        <div class="fixed inset-0 transition-opacity" x-on:click="open = false"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <div class="absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-75"></div>
        </div>

        <!-- Modal Content -->
        <div x-show="open"
            class="relative bg-white dark:bg-gray-800 rounded-lg shadow-xl sm:mx-auto transition transform"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            {{ $slot }}
        </div>
    </div>
</div>
