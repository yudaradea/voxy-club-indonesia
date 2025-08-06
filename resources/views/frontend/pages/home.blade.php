<x-frontend.layout title="| Home">
    <x-frontend.home.section-hero :$heroImage :$heroText />
    <x-frontend.home.section-about :$about />

    <livewire:event-schedlue />

    <x-frontend.home.section-event :$eventStory />
    <x-frontend.home.section-merchandise :$products />
    <x-frontend.section-reviews />
    <x-frontend.home.section-contact :$contact />
</x-frontend.layout>
