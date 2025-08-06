@props(['photo' => ''])

<div x-data="{ show: false, src: '' }" x-show="show" x-cloak @open-image-modal.window="show = true; src = $event.detail"
    class="fixed inset-0 z-50 flex items-center justify-center" style="display: none">
    <!-- backdrop dengan transisi -->
    <div x-show="show" @click="show = false" x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>

    <!-- kontainer gambar (tengah & zoom) -->
    <div x-show="show" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-75"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-75"
        class="relative flex items-center justify-center max-w-[90vw] max-h-[90vh] p-4">
        <!-- tombol close -->
        <button @click="show = false"
            class="absolute z-20 text-white rounded-full -top-0 -right-2 md:-right-0 lg:right-1 ">
            <i class="text-3xl ti ti-square-x-filled"></i>
        </button>

        <!-- gambar -->
        <img :src="src" alt="Preview"
            class="max-w-[90vw] max-h-[90vh] md:max-h-[80vh] md:max-w-[80vw] object-contain rounded-2xl" />
    </div>
</div>
