@props(['name', 'existingPhotoUrl' => null])

{{-- 
    Komponen Blade ini menangani upload file dengan preview menggunakan Alpine.js.
    - 'name': Wajib diisi. Ini akan menjadi atribut 'name' untuk tag <input>.
    - 'existingPhotoUrl': Opsional. URL gambar yang sudah ada untuk form edit.
--}}

<div x-data="{
    previewUrl: '{{ $existingPhotoUrl }}',
    handleFileChange(event) {
        const file = event.target.files[0];
        if (file) {
            this.previewUrl = URL.createObjectURL(file);
        }
    }
}" class="w-full">
    <input type="file" wire:model="{{ $name }}" name="{{ $name }}" id="{{ $name }}" class="hidden"
        x-ref="fileInput" @change="handleFileChange($event)" accept="image/*">

    <label for="{{ $name }}" class="cursor-pointer">
        <div x-show="previewUrl" class="relative">
            <img :src="previewUrl"
                class="object-contain w-full h-64 p-2 bg-gray-100 border border-gray-200 rounded-lg" />
            <div class="mt-3 text-center">
                <span
                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-700 uppercase bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50">
                    Ganti Foto
                </span>
            </div>
        </div>

        <div x-show="!previewUrl"
            class="flex flex-col items-center justify-center w-full h-64 text-center transition-colors border-2 border-dashed rounded-lg bg-gray-50 hover:bg-gray-100">
            <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48"
                aria-hidden="true">
                <path
                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p class="mt-2 text-sm text-gray-600">
                <span class="font-semibold text-indigo-600">Pilih file untuk diupload</span>
            </p>
            <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF hingga 5MB</p>
        </div>
    </label>
</div>
