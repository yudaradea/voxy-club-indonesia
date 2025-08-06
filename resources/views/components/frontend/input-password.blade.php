@props(['disabled' => false])

{{--
    @php
    $show = true;
    $classes =
    $show ?? false
    ? 'pl-1 pr-3 text-2xl ti ti-eye-off cursor-pointer border-none'
    : 'pl-1 pr-3 text-2xl ti ti-eye cursor-pointer border-none';
    
    $show = false;
    @endphp
--}}

<div x-data="{ show: false }" class="flex items-center justify-between w-full border-gray-600 rounded-lg bg-white/10">
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([]) !!} />

    {{ $slot }}
    <div x-show="!show">
        <i class="px-2 text-xl border-none cursor-pointer md:text-2xl ti ti-eye-off" @click="show = !show"></i>
    </div>
    <div x-cloak x-show="show">
        <i class="px-2 text-xl border-none cursor-pointer md:text-2xl ti ti-eye" @click="show = !show"></i>
    </div>
</div>
