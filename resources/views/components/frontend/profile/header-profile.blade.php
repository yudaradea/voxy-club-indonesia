<div class="relative pb-6 shadow-lg bg-white/60 backdrop-blur-sm rounded-3xl">

    <!-- Background Mobil -->
    <div class="relative overflow-hidden shadow-2xl rounded-t-3xl h-72 md:h-80 lg:h-96">
        <img src="{{ $user->member?->fotoMobil() ?? asset('images/default-car.jpg') }}" alt="Car Background"
            class="absolute inset-0 object-cover w-full h-full cursor-pointer"
            @click="$dispatch('open-image-modal', '{{ Storage::url($user->member->car_photo) }}')">

    </div>

    <!-- Foto Profil (setengah di luar) -->
    <div class="absolute z-10 -translate-x-1/2 -translate-y-1/2 bottom-10 left-1/2">
        <img src="{{ $user->member?->fotoProfil() ?? asset('images/default-avatar.jpg') }}" alt="Avatar"
            class="object-cover w-32 h-32 border-4 border-white rounded-full shadow-xl cursor-pointer"
            @click="$dispatch('open-image-modal', '{{ Storage::url($user->member->profile_photo) }}')">
    </div>

    <!-- Nama + Gear + Status (di luar background, dengan bg putih) -->
    <div class="flex flex-col items-center gap-1 mt-16">
        <!-- Nama + Gear -->
        <div class="flex items-center gap-3 px-4 py-2 ">
            <h1 class="text-xl font-bold text-gray-800">{{ $user->name }}</h1>
            <a href="{{ route('profile.setting', $user->id) }}" class="text-sky-600 ">
                <i class="text-2xl ti ti-settings "></i>
            </a>
        </div>

        <!-- Status -->
        <div class="flex flex-row gap-2">
            <p class="px-3 py-1 text-xs font-semibold rounded-full shadow text-sky-700 bg-sky-100">
                {{ ucfirst($user->member->jabatan) }}</p>
            <p
                class="px-3 py-1 text-xs font-semibold rounded-full shadow {{ $user->member->status === 'verified' ? 'text-green-700 bg-green-100' : 'text-amber-700 bg-amber-100' }}">
                {{ ucfirst($user->member->status) }}</p>
        </div>
    </div>
</div>
