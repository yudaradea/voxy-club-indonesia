<!-- About Us Preview -->
<section class="py-12 md:py-16">
    <div class="container px-6 mx-auto">
        <div class="grid items-center gap-12 lg:grid-cols-2">
            <div class="order-2 lg:order-1">
                <div class="mb-4 ">
                    <h2
                        class="text-3xl font-bold text-transparent md:text-4xl bg-gradient-to-r from-slate-800 to-sky-600 bg-clip-text">
                        About Our Community
                    </h2>
                </div>
                <div
                    class="mb-6 text-base prose text-gray-600 prose-a:no-underline prose-p:text-base prose-a:text-sky-600">
                    {!! $about->description !!}
                </div>
                <a href="{{ route('about') }}" class="font-semibold text-sky-600 hover:underline">Learn More →</a>
            </div>
            <div class="order-1 hidden lg:order-2 lg:block">
                <img src="{{ Storage::url($about->image_hero) }}" alt="About Us" class="shadow-2xl rounded-2xl" />
            </div>
        </div>
    </div>
</section>
