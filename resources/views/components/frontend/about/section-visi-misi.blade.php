<!-- VISI & MISI Section -->
<section class="py-12 bg-white lg:py-20">
    <div class="container px-6 mx-auto">
        <div class="grid items-start gap-10 lg:gap-16 md:grid-cols-2">
            <!-- VISI -->
            <div class="text-center">
                <div class="mb-6">
                    <span
                        class="text-2xl font-bold text-transparent md:text-4xl bg-gradient-to-r from-sky-500 to-cyan-500 bg-clip-text">VISI</span>
                </div>
                <p class="text-base leading-relaxed text-justify text-gray-700 ">
                    {{ $about->visi }}
                </p>
            </div>

            <!-- MISI -->
            <div class="text-center">
                <div class="mb-6">
                    <span
                        class="text-2xl font-bold text-transparent md:text-4xl bg-gradient-to-r from-cyan-500 to-sky-500 bg-clip-text ">MISI</span>
                </div>
                <p class="text-base leading-relaxed text-justify text-gray-700 ">
                    {{ $about->misi }}
                </p>
            </div>
        </div>
        <div class="mt-10 lg:mt-16">
            <div
                class="mb-4 text-base leading-normal prose text-justify text-gray-700 prose-a:no-underline prose-p:text-base prose-a:text-sky-600 max-w-none">
                {!! $about->description !!}
            </div>
        </div>
    </div>
</section>
