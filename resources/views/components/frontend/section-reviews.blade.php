<div class="py-12">
    <div x-data="{
        active: 0,
        reviews: {{ $reviews }},
        init() {
            setInterval(() => {
                this.active = (this.active + 1) % this.reviews.length;
            }, 5000);
        },
        prev() {
            this.active = (this.active - 1 + this.reviews.length) % this.reviews.length;
        },
        next() {
            this.active = (this.active + 1) % this.reviews.length;
        }
    }" class="relative w-full max-w-4xl mx-auto">

        <!-- Slider -->
        <div class="relative overflow-hidden bg-white shadow-lg h-80 rounded-xl">
            <template x-for="(review, index) in reviews" :key="index">
                <div x-show="active === index" x-transition:enter="transition ease-in-out duration-500"
                    x-transition:enter-start="opacity-0 translate-x-full"
                    x-transition:enter-end="opacity-100 translate-x-0"
                    x-transition:leave="transition ease-in-out duration-500"
                    x-transition:leave-start="opacity-100 translate-x-0"
                    x-transition:leave-end="opacity-0 -translate-x-full"
                    class="absolute inset-0 flex flex-col items-center justify-center p-6 text-center">

                    <!-- Image -->
                    <img :src="'/storage/' + review.image"
                        class="object-cover w-20 h-20 mb-4 border-2 rounded-full shadow-md border-sky-200"
                        alt="reviewer image" />

                    <span class="mb-3 italic font-semibold text-gray-900" x-text="review.name"></span>

                    <!-- Rating -->
                    <div class="mb-2 flex items-center space-x-0.5">
                        <template x-for="i in 5">
                            <span>
                                <!-- Full star -->
                                <i x-show="i <= Math.floor(review.rating)"
                                    class="text-lg text-yellow-400 ti ti-star-filled">
                                </i>

                                <!-- Half star -->
                                <i x-show="i > Math.floor(review.rating) && (i - 0.5) <= review.rating"
                                    class="text-lg text-yellow-400 ti ti-star-half-filled">
                                </i>

                                <!-- Empty star -->
                                <i x-show="(i - 0.5) > review.rating" class="text-lg text-gray-300 ti ti-star">
                                </i>
                            </span>
                        </template>
                    </div>
                    <p class="mb-2 italic text-gray-700" x-text="review.content"></p>


                </div>
            </template>

            <!-- Prev/Next -->
            <button @click="prev"
                class="absolute w-[40px] h-[40px] text-white -translate-y-1/2 rounded-full left-2 top-1/2 bg-black/30">
                <i class="mr-0.5 text-3xl ti ti-chevron-left"></i>
            </button>
            <button @click="next"
                class="absolute w-[40px] h-[40px] text-white -translate-y-1/2 rounded-full right-2 top-1/2 bg-black/30">
                <i class="text-3xl ti ti-chevron-right ml-0.5"></i>
            </button>
        </div>

        <!-- Indicators -->
        <div class="flex justify-center mt-4 space-x-2">
            <template x-for="(review, index) in reviews" :key="index">
                <button @click="active = index" :class="active === index ? 'bg-sky-600' : 'bg-gray-300'"
                    class="w-8 h-1 transition-all rounded-full"></button>
            </template>
        </div>
    </div>
</div>
