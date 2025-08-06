{{-- resources/views/filament/modals/view-image.blade.php --}}

@props(['imageUrl'])

<div class="flex flex-col items-center">
    {{-- Tampilkan Gambar --}}
    <img src="{{ Storage::url($imageUrl) }}" alt="Gambar Penuh" class="h-auto max-w-full mb-4 rounded-lg">

    {{-- Tombol untuk Download --}}
    <a href="{{ Storage::url($imageUrl) }}" download
        class="inline-flex items-center justify-center gap-1 px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition border border-transparent rounded-md bg-primary-600 hover:bg-primary-500 active:bg-primary-700 focus:outline-none focus:border-primary-900 focus:ring focus:ring-primary-300 disabled:opacity-25"
        style="text-decoration: none;">
        <svg class="w-4 h-4 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
        </svg>
        <span>Simpan gambar</span>
    </a>
</div>
