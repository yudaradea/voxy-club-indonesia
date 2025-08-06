<x-frontend.layout title="| Event Story">

    {{-- HERO IMAGE + OVERLAY --}}
    <section class="relative h-96 md:h-[650px] overflow-hidden">
        <img src="{{ Storage::url($story->hero_image) }}" alt="{{ $story->title }}"
            class="absolute inset-0 object-cover w-full h-full">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

        <div class="relative z-10 flex items-end h-full pb-8">
            <div class="container w-full text-white">
                <h1 class="mb-2 text-2xl font-bold md:text-5xl drop-shadow-lg">{{ $story->title }}</h1>
                <p class="mb-1 text-lg md:text-xl">{{ formatTanggalHari($story->event_date) }} •
                    {{ $story->location }}
                </p>
                <p class="text-sm opacity-80">By {{ $story->author->name }}</p>
            </div>
        </div>
    </section>

    {{-- ARTICLE CONTENT --}}
    <section class="py-12">
        <div class="container">
            <article class="prose text-gray-700 prse-p:text-sm max-w-none">
                {!! $story->content !!}
            </article>
        </div>
    </section>

    {{-- MORE ARTICLES --}}
    <section class="py-16 bg-gray-50">
        <div class="container">
            <h2 class="mb-10 text-3xl font-bold text-center text-gray-800">More Stories</h2>

            {{-- 3 Artikel Lainnya --}}
            <div class="grid gap-8 md:grid-cols-3">
                @forelse($moreStories as $more)
                    <article class="overflow-hidden transition bg-white shadow-lg rounded-2xl hover:shadow-2xl">
                        <img src="{{ Storage::url($more->hero_image) }}" alt="{{ $more->title }}"
                            class="object-cover w-full h-48">
                        <div class="p-6">
                            <span class="text-sm font-semibold text-sky-600">{{ formatTanggal($more->event_date) }}
                            </span>
                            <h3 class="mt-2 mb-2 text-xl font-bold text-gray-800">{{ $more->title }}</h3>
                            <p class="mb-3 text-sm text-gray-600">{{ Str::limit(strip_tags($more->content), 80) }}</p>
                            <a href="{{ route('event.show', $more->slug) }}"
                                class="font-semibold text-sky-600 hover:underline">
                                Read More →
                            </a>
                        </div>
                    </article>
                @empty
                    <p class="italic text-gray-600">No more stories available.</p>
                @endforelse
            </div>
        </div>
    </section>

    </x-layouts.frontend>
