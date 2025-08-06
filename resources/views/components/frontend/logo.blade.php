@props(['logoAttributes' => []])

<a {{ $attributes->merge(['class' => 'font-semibold']) }}>

    {{ $slot }}
</a>
