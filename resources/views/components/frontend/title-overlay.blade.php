@props(['images'])

<section class="relative h-56 md:h-96 lg:[550px] bg-gradient-to-r from-slate-800 via-slate-700 to-slate-600">
    <img src="{{ $images }}" class="absolute inset-0 object-cover w-full h-full opacity-40">
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="relative z-10 flex items-center justify-center h-full text-center">
        <div class="container">
            {{ $slot }}
        </div>
    </div>
</section>
