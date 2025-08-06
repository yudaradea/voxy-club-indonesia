<div
    class="flex items-center justify-center min-h-screen py-12 bg-gradient-to-br from-sky-100 via-blue-50 to-indigo-100">
    <div class="w-full max-w-4xl p-4">
        <div class="grid overflow-hidden shadow-2xl bg-white/80 backdrop-blur-xl rounded-3xl lg:grid-cols-12">
            <!-- Left Image -->
            <div class="relative lg:col-span-5">
                <img src="{{ asset('images/login.jpg') }}" class="object-cover w-full h-96 lg:h-full" alt="Login">
                <div class="absolute inset-0 bg-black/40"></div>
                <div class="absolute bottom-0 left-0 p-8">
                    <h2 class="mb-4 text-3xl font-bold text-white">Welcome Back!</h2>
                    <ul class="space-y-2 text-sm text-white/90">
                        <li class="flex items-center"><svg class="w-5 h-5 mr-2 text-sky-400" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg> Access exclusive content</li>
                        <li class="flex items-center"><svg class="w-5 h-5 mr-2 text-sky-400" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg> Join events & meetups</li>
                        <li class="flex items-center"><svg class="w-5 h-5 mr-2 text-sky-400" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg> Connect with enthusiasts</li>
                    </ul>
                </div>
            </div>

            <!-- Form -->
            <div class="p-8 lg:col-span-7 lg:p-12">
                <!-- Status Message -->
                @if (session('status'))
                    <div class="p-4 mb-6 border-l-4 border-green-400 bg-green-50 rounded-xl">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-green-800">
                                    {{ session('status') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                @if (session('successUpdatePassword'))
                    <div class="p-4 mb-6 border-l-4 border-green-400 bg-green-50 rounded-xl">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-green-800">
                                    {{ session('successUpdatePassword') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                <h3 class="mb-2 text-3xl font-bold text-gray-800">Sign In</h3>
                <p class="mb-6 text-gray-600">Enter your credentials to access your account</p>

                <form wire:submit.prevent="login" class="space-y-6">
                    <div>
                        <x-ui.label>Email Address</x-ui.label>
                        <x-ui.input type="email" wire:model="email" placeholder="john@example.com" required />
                        @error('email')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <x-ui.label>Password</x-ui.label>
                        <x-ui.input-password wire:model="password" placeholder="••••••••" required />
                        @error('password')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input type="checkbox" wire:model="remember"
                                class="border-gray-300 rounded text-sky-600 focus:ring-sky-500">
                            <span class="ml-2 text-sm text-gray-700">Remember me</span>
                        </label>
                        <a href="{{ route('password.request') }}"
                            class="text-sm underline text-sky-600 hover:text-sky-500">Forgot
                            password?</a>
                    </div>

                    <button type="submit"
                        class="w-full bg-gradient-to-r from-sky-500 to-sky-600 hover:from-sky-600 hover:to-sky-700 text-white font-bold py-4 rounded-xl shadow-lg transition transform hover:scale-[1.02]">
                        <span wire:loading.remove>Sign In</span>
                        <span wire:loading>
                            <svg class="w-5 h-5 mr-2 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4" />
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" />
                            </svg>
                        </span>
                    </button>

                    <p class="text-sm text-center text-gray-600">
                        Not a member yet?
                        <a href="{{ route('register') }}"
                            class="font-semibold underline text-sky-600 hover:text-sky-500">Create an account</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
