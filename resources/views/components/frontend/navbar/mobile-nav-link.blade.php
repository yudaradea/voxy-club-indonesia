@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex text-sm md:text-lg items-center font-medium pb-2  text-sky-500 font-semibold transition duration-150 ease-in-out'
            : 'inline-flex text-sm md:text-lg items-center font-medium pb-2  leading-5 text-gray-500 border-transparent hover:text-gray-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
