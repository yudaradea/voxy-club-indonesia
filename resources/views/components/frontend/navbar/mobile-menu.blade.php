<div class="flex items-center gap-3 md:gap-4 lg:hidden">
    <div x-data="{ showMenu: false }">
        <!-- Hamburger menu -->
        <div class="cursor-pointer" @click="showMenu = !showMenu">
            <i class="text-2xl ti ti-menu-deep"></i>
        </div>

        <!-- Link menu -->
        <ul class="fixed inset-0 z-30 px-8 pt-10 pb-6 overflow-y-auto border-b bg-gray-50 max-h-svh" x-show="showMenu"
            x-cloak x-transition:enter="transition ease duration-700 transform"
            x-transition:enter-start="opacity-0 translate-x-full" x-transition:enter-end="opacity-100 -translate-x-0"
            x-transition:leave="transition ease duration-1000 transform"
            x-transition:leave-start="opacity-100 -translate-x-0" x-transition:leave-end="opacity-0 translate-x-full">
            <li class="flex items-center justify-between mb-4 border-none">

                <div class="flex items-center gap-2 py-2">
                    @auth
                        <img src="{{ Storage::url(auth()->user()->member->profile_photo) }}" alt="User Profile"
                            class="object-cover rounded-full size-12" />
                        <div>
                            <span class="font-medium text-gray-600">
                                {{ auth()->user()->name }} </span>
                            <p class="text-sm text-gray-600">{{ auth()->user()->email }}</p>
                        </div>
                    @endauth
                </div>


                <div class="flex items-center justify-end h-16">
                    <div class="h-[30px] w-[30px] rounded-full cursor-pointer ring-2 ring-sky-500 flex items-center justify-center shadow-md"
                        @click="showMenu = !showMenu">
                        <i class="text-2xl ti ti-x"></i>
                    </div>
                </div>
            </li>
            @auth
                <hr class="w-full h-[1px] mx-auto my-4 bg-gray-600 border-0 rounded-sm">
            @endauth
            <div class="w-full h-[60vh] flex flex-col gap-4 mt-6">
                <x-frontend.navbar.mobile-nav-link href="{{ route('home') }}" @click="showMenu = !showMenu"
                    :active="request()->routeIs('home')">
                    Home
                </x-frontend.navbar.mobile-nav-link>

                <x-frontend.navbar.mobile-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                    About
                </x-frontend.navbar.mobile-nav-link>

                <x-frontend.navbar.mobile-nav-link href="{{ route('event') }}" :active="request()->routeIs('event')">
                    Event & Schedule
                </x-frontend.navbar.mobile-nav-link>

                <x-frontend.navbar.mobile-nav-link href="{{ route('merchandise') }}" :active="request()->routeIs('merchandise')">
                    Merchandise
                </x-frontend.navbar.mobile-nav-link>

                @guest
                    <li class="mt-2">
                        <a href="{{ route('register') }}" class="flex items-center justify-center w-full gap-2 button-menu">
                            <i class="text-xl ti ti-user-plus"></i>
                            <p class="text-sm">Join Member</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}" class="flex items-center justify-center w-full gap-2 button-login">
                            <i class="text-xl ti ti-login"></i>
                            <p class="text-sm">Login</p>
                        </a>
                    </li>
                @endguest

                @auth
                    <li class="mt-4">
                        <a href="{{ route('profile') }}" class="flex items-center justify-center w-full gap-2 button-menu">
                            <i class="text-xl ti ti-user"></i>
                            <p class="text-sm">Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile.setting', auth()->user()->id) }}"
                            class="flex items-center justify-center w-full gap-2 button-menu">
                            <i class="text-xl ti ti-settings"></i>
                            <p class="text-sm">Setting</p>
                        </a>
                    </li>
                    <li class="">
                        <form method="post" action="{{ route('logout') }}" x-data>
                            @csrf
                            <button type="submit" class="flex items-center justify-center w-full gap-2 button-login">
                                <i class="text-xl ti ti-logout-2"></i>
                                <p class="text-sm">Log Out</p>
                            </button>
                        </form>
                    </li>
                @endauth
            </div>
        </ul>
    </div>
</div>
