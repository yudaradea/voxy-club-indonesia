<x-frontend.layout title="| Event Schedule">
    <div class="container flex flex-col gap-10 py-12">

        <!-- Hero -->
        <div class="relative">
            <img src="{{ Storage::url($event->image) }}"
                class="object-cover w-full shadow-xl h-80 md:h-96 lg:h-[550px] rounded-xl">
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-xl"></div>
            <div class="absolute text-white bottom-6 left-6">
                <h1 class="pr-2 text-2xl font-bold lg:pr-0 lg:text-4xl">{{ $event->title }}</h1>
                <p class="mt-2 text-sm lg:text-lg opacity-90">
                    {{ Carbon::parse($event->start_date)->locale('id')->isoFormat('dddd, D MMMM YYYY') }} -
                    {{ Carbon::parse($event->end_date)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                </p>
            </div>
        </div>

        <!-- Countdown -->
        <div class="p-4 mt-6 text-center rounded-lg bg-sky-100">
            <p class="text-lg font-semibold text-sky-700">⏳ Akan dimulai dalam:</p>
            <div id="countdown" class="mt-2 font-mono text-base lg:text-2xl text-sky-900"></div>
        </div>

        <!-- Content -->
        <div class="grid gap-8 lg:grid-cols-2">
            <div>
                <h2 class="mb-2 text-2xl font-semibold">📝 Deskripsi</h2>
                <div class="prose text-justify text-gray-700 max-w-none">{!! $event->description !!}</div>
            </div>
            <div>
                <h2 class="mb-2 text-2xl font-bold">📍 Lokasi</h2>

                <div class="w-full aspect-[16/10] md:aspect-[16/7] rounded-lg overflow-hidden lg:h-[450px]">
                    {!! str_replace(['width="600"', 'height="450"'], ['width="100%"', 'height="100%"'], $event->maps) !!}
                </div>
            </div>
        </div>

        <!-- Share -->
        <div class="flex items-center justify-between">
            <p class="text-sm text-gray-500">Bagikan event ini:</p>
            <div class="flex space-x-2">
                <!-- WhatsApp -->
                <a href="https://wa.me/?text={{ urlencode($event->title . ' - ' . route('event.schedule.show', $event->slug)) }}"
                    target="_blank"
                    class="flex items-center justify-center w-8 h-8 text-white bg-green-500 rounded-full">
                    <i class="text-base ti ti-brand-whatsapp"></i>
                </a>

                <!-- Facebook -->
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('event.schedule.show', $event->slug) }}"
                    target="_blank"
                    class="flex items-center justify-center w-8 h-8 text-white bg-blue-600 rounded-full">
                    <i class="text-base ti ti-brand-facebook"></i>
                </a>

                <!-- Twitter / X -->
                <a href="https://twitter.com/intent/tweet?text={{ urlencode($event->title . ' - ' . route('event.schedule.show', $event->slug)) }}"
                    target="_blank" class="flex items-center justify-center w-8 h-8 text-white rounded-full bg-sky-500">
                    <i class="text-base ti ti-brand-x"></i>
                </a>
            </div>
        </div>

    </div>

    <script>
        const countdown = document.getElementById('countdown');
        const start = new Date("{{ $event->start_date }}").getTime();
        const end = new Date("{{ $event->end_date ?? $event->start_date }}").getTime();

        const timer = setInterval(() => {
            const now = new Date().getTime();
            let distance;

            if (now < start) {
                // Belum mulai
                distance = start - now;
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                countdown.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
            } else if (now >= end) {
                // Sudah berakhir
                countdown.innerHTML = "🎉 Event sudah berakhir!";
                clearInterval(timer);
            } else {
                // Sedang berlangsung
                countdown.innerHTML = "🎉 Event sedang berlangsung!";
                clearInterval(timer);
            }
        }, 1000);
    </script>
</x-frontend.layout>
