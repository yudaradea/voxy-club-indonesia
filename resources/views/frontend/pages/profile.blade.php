<x-frontend.layout title="| Profile">

    <div x-data="{ activeTab: 'profile' }" class="min-h-screen py-12 bg-gradient-to-br from-sky-100 via-blue-50 to-indigo-100">

        <div class="container px-4 mx-auto max-w-7xl">

            <!-- Header Banner -->
            <x-frontend.profile.header-profile :$user />

            <!-- Warning Alert -->
            @if ($user->member->status === 'pending')
                <div
                    class="flex items-stretch gap-3 p-4 mt-6 border-l-4 shadow bg-amber-100 border-amber-500 text-amber-800 rounded-r-xl">
                    <svg class="self-center w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                    </svg>
                    <div>
                        <p class="font-bold">Akun belum terverifikasi</p>
                        <p class="text-sm">Silakan lakukan konfirmasi ke Admin via WhatsApp: <a
                                href="https://wa.me/{{ $contact->whatsapp }}"
                                class="underline">{{ formatWhatsapp($contact->whatsapp) }}</a></p>
                    </div>
                </div>
            @endif

            <!-- Tabs -->
            <div class="p-6 mt-10 shadow-lg bg-white/60 backdrop-blur-sm rounded-2xl">
                <div class="border-b border-gray-300">
                    <nav class="flex space-x-6">
                        <button @click="activeTab = 'profile'"
                            :class="activeTab === 'profile' ? 'border-sky-500 text-sky-600' :
                                'border-transparent text-gray-500'"
                            class="pb-2 text-sm font-semibold transition border-b-2">Profile</button>
                        <button @click="activeTab = 'kas'"
                            :class="activeTab === 'kas' ? 'border-sky-500 text-sky-600' :
                                'border-transparent text-gray-500'"
                            class="pb-2 text-sm font-semibold transition border-b-2">Uang Kas</button>
                        <button @click="activeTab = 'member'"
                            :class="activeTab === 'member' ? 'border-sky-500 text-sky-600' :
                                'border-transparent text-gray-500'"
                            class="pb-2 text-sm font-semibold transition border-b-2">Member</button>
                    </nav>
                </div>

                <!-- Content -->
                <div class="mt-6">
                    <!-- Profile -->
                    <div x-show="activeTab === 'profile'" x-transition>
                        <x-frontend.profile.detail-profile :$user />
                    </div>


                    <div x-show="activeTab === 'kas'" x-transition>
                        <x-frontend.profile.kas :$kasHistory />
                    </div>

                    <!-- Member (striped table) -->
                    <div x-show="activeTab === 'member'" x-transition>
                        <!-- Start coding here -->
                        <livewire:list-member />
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal --}}
    <x-ui.modal-image />
</x-frontend.layout>
