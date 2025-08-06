<x-frontend.layout title="| About">
    <x-frontend.title-overlay :images="Storage::url($aboutPage->image_hero)">
        <h1 class="mb-4 text-3xl font-extrabold text-white md:text-4xl lg:text-5xl drop-shadow-lg">
            {{ $aboutPage->title }}
        </h1>
        <p class="text-base md:text-xl text-white/90 drop-shadow">
            {{ $aboutPage->subtitle }}
        </p>
    </x-frontend.title-overlay>

    <x-frontend.about.section-visi-misi :about="$aboutPage" />
    <x-frontend.about.section-pengurus :team1="$team1" :team2="$team2" />
    <x-frontend.section-reviews />

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-sky-500 to-cyan-500">
        <div class="container px-6 mx-auto text-center">
            <h2 class="mb-6 text-3xl font-bold text-white md:text-4xl">Bergabung dengan Komunitas Kami</h2>
            <p class="mb-8 text-lg md:text-xl text-sky-100">Jadilah bagian dari perjalanan otomotif yang luar biasa!</p>
            <a href="{{ route('register') }}"
                class="px-8 py-3 text-base font-bold transition transform bg-white shadow-lg rounded-xl text-sky-600 hover:shadow-xl hover:scale-105">
                Daftar Sekarang
            </a>
        </div>
    </section>


</x-frontend.layout>
