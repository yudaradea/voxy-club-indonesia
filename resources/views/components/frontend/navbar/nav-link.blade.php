@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex h-full mt-0.5 pt-1 text-sm px-2 items-center border-b-2 border-sky-500 font-medium leading-5 text-sky-500 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex h-full mt-0.5 pt-1 text-sm px-2 items-center font-medium leading-5 text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-sky-500 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
