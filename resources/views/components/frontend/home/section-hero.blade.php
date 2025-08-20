<section id="hero">
    <div x-data="{
        // Sets the time between each slides in milliseconds
        autoplayIntervalTime: 5000,
        slides: [
    
            @foreach ($heroImage as $item)
        {
            imgSrc: '{{ Storage::url($item->image) }}',
            imgAlt: '{{ $item->title }}',

        }, @endforeach
    
        ],
        currentSlideIndex: 1,
        isPaused: false,
        autoplayInterval: null,
        previous() {
            if (this.currentSlideIndex > 1) {
                this.currentSlideIndex = this.currentSlideIndex - 1
            } else {
                // If it's the first slide, go to the last slide           
                this.currentSlideIndex = this.slides.length
            }
        },
        next() {
            if (this.currentSlideIndex < this.slides.length) {
                this.currentSlideIndex = this.currentSlideIndex + 1
            } else {
                // If it's the last slide, go to the first slide    
                this.currentSlideIndex = 1
            }
        },
        autoplay() {
            this.autoplayInterval = setInterval(() => {
                if (!this.isPaused) {
                    this.next()
                }
            }, this.autoplayIntervalTime)
        },
        // Updates interval time   
        setAutoplayInterval(newIntervalTime) {
            clearInterval(this.autoplayInterval)
            this.autoplayIntervalTime = newIntervalTime
            this.autoplay()
        },
    }" x-init="autoplay" class="relative w-full overflow-hidden">

        <!-- slides -->
        <!-- Change min-h-[50svh] to your preferred height size -->
        <div class="relative w-full h-[320px] md:h-[700px] lg:h-[750px] rounded-b-lg shadow-sm">
            <template x-for="(slide, index) in slides">
                <div x-cloak x-show="currentSlideIndex == index + 1" class="absolute inset-0"
                    x-transition.opacity.duration.1000ms>

                    <img class="absolute inset-0 object-cover w-full h-full rounded-b-lg shadow-sm text-on-surface"
                        x-bind:src="slide.imgSrc" x-bind:alt="slide.imgAlt" />
                </div>
            </template>

            <div class="absolute inset-0 flex items-center justify-center rounded-b-lg shadow-sm bg-black/50">
                <div class="container flex flex-col items-center text-center text-white">
                    <h1 class="mb-4 text-3xl font-bold text-center md:text-5xl lg:text-7xl ">
                        {{ $heroText->title }}
                    </h1>
                    <p class="mb-8 text-lg md:text-xl lg:text-2xl">
                        {{ $heroText->subtitle }}
                    </p>
                    <div class="flex items-center justify-center gap-2 button-1">
                        <a href="{{ route('register') }}">
                            {{ $heroText->button_text }}
                        </a>
                        <i class="mt-0.5 ti ti-arrow-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
