  <!-- Past Events (Article Cards) -->
  <section class="py-20 ">
      <div class="container px-6 mx-auto">
          <div class="mb-12 text-center">
              <h2
                  class="text-3xl font-bold text-transparent md:text-4xl bg-gradient-to-r from-slate-800 to-sky-600 bg-clip-text">
                  Story Event
              </h2>
          </div>

          <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
              <!-- Event 1 -->
              @foreach ($eventStory as $story)
                  <article
                      class="flex flex-col overflow-hidden transition bg-white shadow-lg rounded-2xl hover:shadow-2xl">
                      <img src="{{ Storage::url($story->hero_image) }}" alt="{{ $story->title }}"
                          class="object-cover w-full h-48" />

                      <div class="flex flex-col flex-1 p-6">
                          <!-- Tanggal -->
                          <span class="text-sm font-semibold text-sky-600">
                              {{ formatTanggal($story->event_date) }}
                          </span>

                          <!-- Judul (maks 2 baris) -->
                          <h3 class="mt-2 mb-3 text-xl font-bold text-gray-800 line-clamp-2">
                              {{ $story->title }}
                          </h3>

                          <!-- Isi konten -->
                          <p class="flex-grow mb-4 prose text-gray-600">
                              {!! Str::limit(strip_tags($story->content), 120) !!}
                          </p>

                          <!-- Lokasi & tombol Read More di dasar card -->
                          <div class="flex items-center justify-between mt-auto">
                              <span class="text-sm text-gray-500">{{ $story->location }}</span>
                              <a href="{{ route('event.show', $story->slug) }}" class="font-semibold text-sky-600">
                                  Read More →
                              </a>
                          </div>
                      </div>
                  </article>
              @endforeach

          </div>
          <div class="text-center mt-14">
              <a href="{{ route('event') }}" class="text-white shadow-xl button-1"> View More </a>
          </div>
  </section>
