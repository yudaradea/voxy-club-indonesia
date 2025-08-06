<div class="relative" x-data="{ show: false }">
    <input :type="show ? 'text' : 'password'"
        {{ $attributes->merge(['class' => 'block w-full rounded-xl border-gray-300 shadow-sm focus:ring-sky-500 focus:border-sky-500 bg-white text-gray-900 placeholder-gray-400 pr-10']) }} />
    <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500">
        <div x-show="!show">
            <i class="px-2 text-xl border-none cursor-pointer md:text-2xl ti ti-eye-off" @click="show = !show"></i>
        </div>
        <div x-cloak x-show="show">
            <i class="px-2 text-xl border-none cursor-pointer md:text-2xl ti ti-eye" @click="show = !show"></i>
        </div>
    </button>
</div>
