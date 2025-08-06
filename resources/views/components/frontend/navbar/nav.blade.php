<nav x-data="{ scroll: false }" class="sticky top-0 z-20 mx-auto bg-white border-b border-gray-300"
    @scroll.window="scroll = (window.pageYOffset > 70) ? true : false" x-bind:class="scroll ? 'shadow-md' : ''">
    <div class="container flex flex-row items-center justify-between h-20 mx-auto">
        {{-- logo --}}

        <div class="flex items-center">
            <x-frontend.logo href="{{ route('home') }}">
                <div class="flex flex-row items-center gap-2">
                    <div>
                        <img src="{{ asset('images/logo.png') }}" alt="" class="h-16">
                    </div>
                    <div>
                        <p class="text-lg font-semibold md:text-xl font-poppins">Voxy <span class="text-sky-600">Club
                                Indonesia</span></p>
                    </div>
                </div>
            </x-frontend.logo>
        </div>

        <div class="items-center hidden h-full gap-8 lg:flex">
            <x-frontend.navbar.nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                Home
            </x-frontend.navbar.nav-link>

            <x-frontend.navbar.nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                About
            </x-frontend.navbar.nav-link>

            <x-frontend.navbar.nav-link href="{{ route('event') }}" :active="request()->routeIs('event*')">
                Event & Schedule
            </x-frontend.navbar.nav-link>

            <x-frontend.navbar.nav-link href="{{ route('merchandise') }}" :active="request()->routeIs('merchandise')">
                Merchandise
            </x-frontend.navbar.nav-link>
        </div>

        @guest
            <div class="hidden gap-4 lg:flex lg:items-center">
                <a href="{{ route('register') }}" class="button-menu">Join Now</a>
                <a href="{{ route('login') }}" class="button-login">Login</a>
            </div>
        @endguest

        @auth
            {{-- Alpine Dropdown --}}
            <div class="relative hidden lg:block" x-data="{ dropdown: false }" @click.away="dropdown = false">
                <button @click="dropdown = !dropdown"
                    class="flex items-center gap-2.5 bg-slate-100 hover:bg-slate-200 rounded-full py-1.5 pl-2 pr-4 text-sm font-semibold transition">
                    <img class="object-cover w-8 h-8 rounded-full"
                        src="{{ Storage::url(auth()->user()->member->profile_photo) }}" alt="">
                    <span class="text-slate-700 max-w-[7rem] truncate">{{ auth()->user()->name }}</span>
                    <svg class="w-4 h-4 transition-transform text-slate-500" :class="dropdown ? 'rotate-180' : ''"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="dropdown" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 z-20 w-56 mt-3 origin-top-right bg-white border shadow-xl rounded-xl border-slate-200">

                    <div class="p-2">
                        <a href="{{ route('profile') }}"
                            class="flex items-center gap-3 px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-100 rounded-lg transition">
                            <i class="text-lg ti ti-user text-slate-500"></i>
                            Profile
                        </a>

                        <a href="{{ route('profile.setting', auth()->user()->id) }}"
                            class="flex items-center gap-3 px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-100 rounded-lg transition">
                            <i class="text-lg ti ti-settings text-slate-500"></i>
                            Setting
                        </a>

                        @if (auth()->user()->role === 'admin')
                            <a href="/admin" target="_blank"
                                class="flex items-center gap-3 px-3 py-2.5 text-sm text-slate-700 hover:bg-slate-100 rounded-lg transition">
                                <i class="text-lg ti ti-user-cog text-slate-500"></i>
                                Admin Dashboard
                            </a>
                        @endif

                        <hr class="my-2 border-slate-200">

                        <form method="post" action="{{ route('logout') }}" x-data>
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center gap-3 px-3 py-2.5 text-sm text-red-600 hover:bg-red-50 rounded-lg transition">
                                <i class="text-lg ti ti-logout-2"></i>
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endauth

        {{-- Mobile --}}
        <x-frontend.navbar.mobile-menu />
    </div>
</nav>
