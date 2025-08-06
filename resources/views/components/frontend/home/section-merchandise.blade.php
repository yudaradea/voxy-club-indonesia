<section class="py-20 bg-gradient-to-br from-slate-50 via-white to-sky-50/50">
    <div class="container px-6 mx-auto max-w-7xl">
        <!-- Header -->
        <div class="mb-12 text-center">
            <h2
                class="text-3xl font-bold text-transparent md:text-4xl bg-gradient-to-r from-slate-800 to-sky-600 bg-clip-text">
                Our Merchandise
            </h2>
        </div>

        <!-- Products Grid -->
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($products as $product)
                <div class="relative group">
                    <!-- Card Container -->
                    <div
                        class="relative overflow-hidden transition-all duration-500 border shadow-xl rounded-2xl bg-white/80 backdrop-blur-lg border-white/20 hover:shadow-2xl hover:shadow-sky-500/20 hover:-translate-y-2">

                        <!-- Image Container -->
                        <div class="relative overflow-hidden aspect-[4/3]">
                            <!-- Gradient Overlay -->
                            <div
                                class="absolute inset-0 transition-opacity duration-500 opacity-0 bg-gradient-to-br from-sky-500/10 to-cyan-500/10 group-hover:opacity-100">
                            </div>

                            <!-- Main Image -->
                            <img src="{{ Storage::url($product->images[0]) }}" alt="{{ $product->name }}"
                                class="object-contain w-full h-full transition-all duration-700 group-hover:scale-110">

                            <!-- Hover Overlay -->
                            <div
                                class="absolute inset-0 transition-opacity duration-500 opacity-0 bg-gradient-to-t from-black/60 via-transparent to-transparent group-hover:opacity-100">
                            </div>

                            <!-- Badge -->
                            <span
                                class="absolute px-3 py-1 text-xs font-bold text-white rounded-full top-4 left-4 bg-gradient-to-r from-sky-500 to-cyan-500">
                                NEW
                            </span>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3
                                class="mb-2 text-xl font-bold transition-colors duration-300 text-slate-800 line-clamp-2 group-hover:text-sky-600">
                                {{ $product->name }}
                            </h3>

                            <p class="mb-4 text-sm text-slate-600 line-clamp-2">
                                {{ $product->short_description }}
                            </p>

                            <!-- Price & CTA -->
                            <div class="flex items-center justify-between">
                                <div>
                                    <span
                                        class="text-2xl font-bold text-transparent bg-gradient-to-r from-sky-600 to-cyan-600 bg-clip-text">
                                        Rp{{ number_format($product->price, 0, ',', '.') }}
                                    </span>
                                </div>

                                <a href="{{ route('merchandise.show', $product->slug) }}"
                                    class="group/btn relative inline-flex items-center px-5 py-2.5 text-sm font-semibold text-white 
                                          bg-gradient-to-r from-sky-500 to-cyan-500 rounded-full overflow-hidden 
                                          transition-all duration-300 hover:shadow-lg hover:shadow-sky-500/30">
                                    <span class="relative z-10">View</span>
                                    <svg class="w-4 h-4 ml-2 transition-transform duration-300 group-hover/btn:translate-x-1"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>

                                    <!-- Hover Background -->
                                    <div
                                        class="absolute inset-0 transition-transform duration-300 translate-x-full bg-gradient-to-r from-cyan-600 to-sky-600 group-hover/btn:translate-x-0">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Shadow Effect -->
                    <div
                        class="absolute h-4 transition-opacity duration-500 opacity-0 -bottom-2 left-4 right-4 bg-gradient-to-r from-sky-500/20 to-cyan-500/20 blur-xl group-hover:opacity-100">
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-14">
            <a href="{{ route('merchandise') }}" class="text-white shadow-xl button-1"> View More </a>
        </div>
    </div>
</section>

<!-- Add this to your CSS for line-clamp -->
<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .group:hover .group-hover\:scale-110 {
        transform: scale(1.1);
    }

    .group:hover .group-hover\:-translate-y-2 {
        transform: translateY(-0.5rem);
    }

    .backdrop-blur-lg {
        backdrop-filter: blur(16px);
    }
</style>
