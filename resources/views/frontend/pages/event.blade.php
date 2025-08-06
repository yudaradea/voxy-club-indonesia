<x-frontend.layout title="| Event">
    <x-frontend.title-overlay :images="Storage::url($hero->image)">
        <h1 class="mb-4 text-3xl font-extrabold text-white md:text-4xl lg:text-5xl drop-shadow-lg">
            {{ $hero->title }}
        </h1>
        <p class="text-base md:text-xl text-white/90 drop-shadow">
            {{ $hero->subtitle }}
        </p>
    </x-frontend.title-overlay>

    <livewire:event-schedlue />

    <x-frontend.event.section-event-story :$stories />
</x-frontend.layout>
