<!-- Contact Us with Google Maps -->
<section class="py-20 text-white bg-gray-900">
    <div class="container px-6 mx-auto">
        <div class="mb-12 text-center">
            <h2 class="text-3xl font-bold text-white md:text-4xl ">
                Contact Us
            </h2>
        </div>

        <div class="grid gap-12 lg:grid-cols-2">
            <!-- Contact Form -->
            <div>
                <h3 class="mb-6 text-2xl font-bold">Get In Touch</h3>
                <div>
                    <livewire:contact-us-form />
                </div>
                <!-- Contact Info & Socials -->
                <div class="mt-8 space-y-4">
                    <!-- Address -->
                    <div class="flex items-center space-x-3">
                        <i class="text-xl ti ti-map-pin-filled text-sky-400"></i>
                        <span>{{ $contact->address }}</span>
                    </div>
                    <!-- WhatsApp -->
                    <div class="flex items-center space-x-3">
                        <i class="text-xl text-green-400 ti ti-brand-whatsapp"></i>
                        <a href="https://wa.me/{{ $contact->whatsapp }}" target="_blank"
                            class="transition hover:text-green-400">
                            {{ formatWhatsapp($contact->whatsapp) }}
                        </a>
                    </div>
                    <!-- Email -->
                    <div class="flex items-center space-x-3">
                        <i class="text-xl ti ti-mail-filled text-sky-400"></i>
                        <a href="mailto:{{ $contact->email }}" class="transition hover:text-sky-400">
                            {{ $contact->email }}
                        </a>
                    </div>

                    <!-- Social Media -->
                    <div class="flex mt-6 space-x-6 text-2xl">
                        <a href="{{ $contact->youtube }}" target="_blank" class="text-red-500 transition"><i
                                class="text-3xl ti ti-brand-youtube"></i></a>
                        <a href="{{ $contact->instagram }}" target="_blank" class="text-pink-500 transition"><i
                                class="text-3xl ti ti-brand-instagram"></i></a>
                        <a href="{{ $contact->tiktok }}" target="_blank" class="text-white transition"><i
                                class="text-3xl ti ti-brand-tiktok"></i></a>
                        <a href="{{ $contact->facebook }}" target="_blank" class="text-blue-500 transition"><i
                                class="text-3xl ti ti-brand-facebook"></i></a>
                    </div>
                </div>
            </div>

            <!-- Google Maps -->
            <div>
                <h3 class="mb-6 text-2xl font-bold">Our Location</h3>
                <div class="w-full aspect-[16/10] md:aspect-[16/7] rounded-lg overflow-hidden lg:h-[450px]">
                    {!! str_replace(['width="600"', 'height="450"'], ['width="100%"', 'height="100%"'], $contact->maps) !!}
                </div>
            </div>
        </div>
    </div>
</section>
