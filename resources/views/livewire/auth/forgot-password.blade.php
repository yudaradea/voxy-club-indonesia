<div
    class="flex flex-col items-center justify-center min-h-screen py-12 lg:py-0 bg-gradient-to-br from-slate-50 to-sky-100">
    <div class="container px-4 mx-auto">
        <div class="max-w-md mx-auto">
            <div class="overflow-hidden shadow-2xl bg-white/90 backdrop-blur-xl rounded-3xl">

                <!-- Header -->
                <div class="p-8 text-center bg-gradient-to-r from-sky-500 to-cyan-500">
                    <h2 class="text-2xl font-bold text-white">Reset Password</h2>
                    <p class="mt-2 text-sky-100">We'll send you a reset link</p>
                </div>

                <!-- Form -->
                <div class="p-8">
                    <div class="mb-6 text-center">
                        <svg class="w-16 h-16 mx-auto text-sky-500" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>

                    <!-- Status Message -->
                    @if (session('status'))
                        <div class="p-4 mb-4 text-green-700 bg-green-100 border-l-4 border-green-500 rounded">
                            <p class="text-sm">{{ session('status') }}</p>
                        </div>
                    @endif

                    <form wire:submit.prevent="sendResetLink" class="space-y-6">
                        <!-- Email -->
                        <div>
                            <x-ui.label for="email" value="Email Address" />
                            <x-ui.input id="email" type="email" class="block w-full border-gray-300 rounded-xl "
                                wire:model='email' required placeholder="john@example.com" />
                            @error('email')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-sky-500 to-cyan-500 hover:from-sky-600 hover:to-cyan-600 text-white font-bold py-3 px-4 rounded-xl transition duration-300 transform hover:scale-[1.02]">
                            <span wire:loading.remove>Send Reset Link</span>
                            <span wire:loading>
                                <svg class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" fill="none"
                                    viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Sending...
                            </span>
                        </button>

                        <!-- Back to Login -->
                        <p class="text-sm text-center text-gray-600">
                            Remember your password?
                            <a href="{{ route('login') }}"
                                class="font-semibold underline text-sky-600 hover:text-sky-500">
                                Back to login
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
