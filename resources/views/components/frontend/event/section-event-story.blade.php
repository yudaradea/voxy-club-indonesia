@if ($featured = $stories->where('is_featured', true)->first())
    <section class="py-12 bg-gradient-to-r from-sky-50 to-cyan-100">
        <div class="container px-6 mx-auto">
            <h2 class="mb-8 text-3xl font-bold text-gray-800">Featured Story</h2>
            <div class="overflow-hidden bg-white shadow-xl rounded-2xl md:flex">
                <img src="{{ Storage::url($featured->hero_image) }}" alt="{{ $featured->title }}"
                    class="object-cover w-full h-64 md:w-1/2 md:h-80">
                <div class="flex flex-col justify-center p-8 md:w-1/2">
                    <span class="text-sm font-semibold text-sky-600">{{ formatTanggal($featured->event_date) }}</span>
                    <h3 class="mt-2 mb-3 text-xl font-bold text-gray-800 md:text-2xl">{{ $featured->title }}</h3>
                    <p class="mb-4 prose text-gray-600 prose-p:text-base">
                        {{ Str::limit(strip_tags($featured->content), 150) }}</p>
                    <a href="{{ route('event.show', $featured->slug) }}"
                        class="inline-flex items-center font-semibold text-sky-600 hover:underline">
                        Read More <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endif

<!-- Stories Grid -->
<section class="py-12">
    <div class="container px-6 mx-auto">
        <div class="grid gap-8 md:grid-cols-3">
            @foreach ($stories as $story)
                <article class="overflow-hidden transition bg-white shadow-lg rounded-2xl hover:shadow-2xl">
                    <img src="{{ Storage::url($story->hero_image) }}" alt="{{ $story->title }}"
                        class="object-cover w-full h-48">
                    <div class="p-6">
                        <span class="text-sm font-semibold text-sky-600">{{ formatTanggal($story->event_date) }}</span>
                        <h3 class="mt-2 mb-3 text-xl font-bold text-gray-800">{{ $story->title }}</h3>
                        <p class="mb-4 prose text-gray-600">{!! Str::limit(strip_tags($story->content), 120) !!}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">{{ $story->location }}</span>
                            <a href="{{ route('event.show', $story->slug) }}" class="font-semibold text-sky-600">Read
                                More →</a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="pt-4">
            {{ $stories->links() }}
        </div>


    </div>
</section>
