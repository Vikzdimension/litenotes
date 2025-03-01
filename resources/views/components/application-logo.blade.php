<div class="flex items-center justify-center">
    <img src="{{ asset('s_note.png') }}" alt="Lite Notes" width="50" height="50"
        class="object-contain hover-rotate360 transition transform duration-300" />
    <img src="{{ asset('storage/s_note.png') }}" alt="Lite Notes" width="50" height="50"
        class="object-contain hover-rotate360 transition transform duration-300" />

</div>

<style>
    @keyframes rotate360 {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .hover-rotate360:hover {
        animation: rotate360 0.6s linear;
    }
</style>
