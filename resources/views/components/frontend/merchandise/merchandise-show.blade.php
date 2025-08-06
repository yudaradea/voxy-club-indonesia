<x-frontend.layout title="| Merchandise">
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-sky-50/30">
        <div class="container px-4 py-12 mx-auto max-w-7xl">
            <!-- Back Button -->
            <div class="mb-8">
                <a href="{{ route('merchandise') }}"
                    class="inline-flex items-center transition-all duration-300 group text-slate-600 hover:text-sky-600">
                    <svg class="w-5 h-5 mr-2 transition-transform duration-300 group-hover:-translate-x-1" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                    <span class="font-medium">Back to Collection</span>
                </a>
            </div>

            <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">
                <!-- Image Gallery -->
                <div class="space-y-6">
                    <!-- Main Image -->
                    <div class="relative overflow-hidden bg-white shadow-xl group rounded-2xl">
                        <div class="aspect-[4/3] relative">
                            <img id="mainImage" src="{{ Storage::url($product->images[0]) }}" alt="{{ $product->name }}"
                                class="object-contain w-full h-full transition-all duration-700 ease-out group-hover:scale-110">

                            <!-- Hover Overlay -->
                            <div
                                class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/20 to-transparent group-hover:opacity-100">
                            </div>

                            <!-- Zoom Icon -->
                            <div
                                class="absolute p-2 transition-all duration-300 rounded-full opacity-0 top-4 right-4 bg-white/90 backdrop-blur-sm group-hover:opacity-100">
                                <svg class="w-5 h-5 text-slate-700" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Thumbnails -->
                    <div class="grid grid-cols-4 gap-4">
                        @foreach ($product->images as $index => $image)
                            <div class="relative overflow-hidden bg-white cursor-pointer rounded-xl group"
                                onclick="changeImage('{{ Storage::url($image) }}')">
                                <img src="{{ Storage::url($image) }}" alt="{{ $product->name }} {{ $index + 1 }}"
                                    class="object-contain w-full h-24 transition-all duration-300 group-hover:scale-110 group-hover:brightness-110">

                                <!-- Active State -->
                                <div
                                    class="absolute inset-0 transition-all duration-300 border-2 border-transparent rounded-xl group-hover:border-sky-500">
                                </div>

                                <!-- Hover Effect -->
                                <div
                                    class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-sky-500/20 to-transparent group-hover:opacity-100">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Product Details -->
                <div class="space-y-8">
                    <div>
                        <h1 class="text-3xl font-bold leading-tight lg:text-4xl text-slate-900">{{ $product->name }}
                        </h1>
                        <p
                            class="mt-2 text-2xl font-bold text-transparent lg:text-3xl bg-gradient-to-r from-sky-600 to-cyan-600 bg-clip-text">
                            Rp{{ formatRupiah($product->price) }}
                        </p>
                    </div>

                    <p class="leading-relaxed text-justify text-slate-600">{{ $product->description }}</p>

                    <form id="orderForm" class="space-y-6">
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <!-- Quantity -->
                            <div>
                                <label class="block mb-3 text-sm font-semibold text-slate-700 ">Quantity</label>
                                <div class="relative">
                                    <input type="number" name="quantity" min="1" max="{{ $product->stock }}"
                                        value="1"
                                        class="w-full py-3 pl-4 pr-12 transition-all duration-300 border-2 border-slate-200 rounded-xl focus:border-sky-500 focus:ring-4 focus:ring-sky-500/20">
                                    <span class="absolute text-sm -translate-y-1/2 right-4 top-1/2 text-slate-500">
                                        / {{ $product->stock }}
                                    </span>
                                </div>
                            </div>

                            <!-- Size -->
                            @if (!empty($product->sizes) && is_array($product->sizes))
                                <div>
                                    <label class="block mb-3 text-sm font-semibold text-slate-700">Size</label>
                                    <select name="size"
                                        class="w-full px-4 py-3 transition-all duration-300 border-2 border-slate-200 rounded-xl focus:border-sky-500 focus:ring-4 focus:ring-sky-500/20">
                                        @php
                                            $sizes = is_string($product->sizes[0] ?? '')
                                                ? array_map('trim', explode(',', $product->sizes[0]))
                                                : $product->sizes;
                                        @endphp
                                        @foreach ($sizes as $size)
                                            <option value="{{ $size }}">{{ $size }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                        </div>

                        <!-- Buy Button -->
                        <button type="button" onclick="buyNow()"
                            class="relative w-full px-6 py-4 overflow-hidden font-semibold text-white transition-all duration-300 group rounded-xl bg-gradient-to-r from-sky-600 to-cyan-600 hover:shadow-2xl hover:shadow-sky-500/25">
                            <span class="relative z-10">Buy Now</span>
                            <div
                                class="absolute inset-0 transition-transform duration-300 translate-y-full bg-white/20 group-hover:translate-y-0">
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function changeImage(src) {
            const mainImage = document.getElementById('mainImage');
            mainImage.style.opacity = '0';
            setTimeout(() => {
                mainImage.src = src;
                mainImage.style.opacity = '1';
            }, 150);
        }

        // Add smooth transition for image changes
        document.getElementById('mainImage').style.transition = 'opacity 0.3s ease-in-out, transform 0.7s ease-out';

        function buyNow() {
            const form = document.getElementById('orderForm');
            const formData = new FormData(form);
            const size = formData.get('size') || '';
            const quantity = formData.get('quantity');
            const productName = "{{ $product->name }}";
            const price = {{ $product->price }};
            const totalPrice = price * quantity;

            let message = `🛍️ New Order Request!\n\n`;
            message += `📦 Product: ${productName}\n`;
            if (size) message += `📏 Size: ${size}\n`;
            message += `🔢 Quantity: ${quantity}\n`;
            message += `💰 Total: Rp${totalPrice.toLocaleString('id-ID')}\n\n`;
            message += `Please confirm my order. Thank you! 🙏`;

            const whatsappUrl = `https://wa.me/{{ $whatsapp }}?text=${encodeURIComponent(message)}`;
            window.open(whatsappUrl, '_blank');
        }
    </script>

</x-frontend.layout>
