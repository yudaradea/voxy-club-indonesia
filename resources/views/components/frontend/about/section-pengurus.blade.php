<!-- Dewan Pengurus Pusat -->
<section class="py-12 bg-white lg:py-20">
    <div class="container px-6 mx-auto">
        <div class="mb-12 text-center">
            <h2
                class="text-3xl font-bold text-transparent md:text-4xl bg-gradient-to-r from-slate-800 to-sky-600 bg-clip-text">
                Dewan Pengurus Pusat
            </h2>
        </div>

        <!-- Ketua & Wakil -->
        <div class="grid gap-12 mb-16 md:grid-cols-2">
            <!-- Ketua -->
            @forelse ($team1 as $item)
                <div class="text-center group">
                    <div class="relative mb-6">
                        <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}"
                            class="object-cover w-48 h-48 mx-auto transition-transform border-4 rounded-full border-sky-500 group-hover:scale-105">

                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $item->name }}</h3>
                    <p class="text-gray-600">{{ $item->jabatan }}</p>
                </div>
            @empty
                <p>empty</p>
            @endforelse
        </div>

        <!-- Direksi -->
        <div class="grid gap-8 md:grid-cols-4">

            @forelse ($team2 as $item)
                <div class="text-center group">
                    <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}"
                        class="object-cover w-32 h-32 mx-auto mb-4 transition border-4 border-gray-300 rounded-full group-hover:border-sky-500">
                    <h4 class="text-lg font-bold">{{ $item->name }}</h4>
                    <p class="text-sm text-gray-600">{{ $item->jabatan }}</p>
                </div>
            @empty
                <p>empty</p>
            @endforelse

        </div>
    </div>
</section>
