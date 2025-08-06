<div
    class="flex flex-col items-center justify-center min-h-screen py-12 lg:py-0 bg-gradient-to-br from-slate-50 to-sky-100">
    <div class="container px-4 mx-auto">
        <div class="max-w-2xl mx-auto">
            <div class="overflow-hidden shadow-2xl bg-white/90 backdrop-blur-xl rounded-3xl">

                <!-- Header -->
                <div class="p-8 text-center bg-gradient-to-r from-sky-500 to-cyan-500">
                    <h2 class="text-2xl font-bold text-white">Create New Password</h2>
                    <p class="mt-2 text-sky-100">Choose a strong password for your account</p>
                </div>

                <!-- Form -->
                <div class="p-8 lg:p-12">
                    <div class="mb-6 text-center">
                        <svg class="w-20 h-20 mx-auto text-sky-500" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                    </div>

                    <!-- Status -->
                    @if (session('status'))
                        <div class="p-4 mb-4 text-green-700 bg-green-100 border-l-4 border-green-500 rounded">
                            <p class="text-sm">{{ session('status') }}</p>
                        </div>
                    @endif

                    <form wire:submit.prevent="resetPassword" class="space-y-6">
                        <!-- Email (Readonly) -->
                        <div>
                            <x-ui.label for="email" value="Email Address" />
                            <x-ui.input id="email" type="email"
                                class="block w-full border-gray-300 rounded-xl bg-gray-50" wire:model='email'
                                readonly />
                            @error('email')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- New Password -->
                        <div>
                            <x-ui.label for="password" value="New Password" />
                            <x-ui.input-password id="password" class="block w-full border-gray-300 rounded-xl "
                                type="password" wire:model='password' required placeholder="••••••••" />
                            @error('password')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <x-ui.label for="password_confirmation" value="Confirm Password" />
                            <x-ui.input-password id="password_confirmation"
                                class="block w-full border-gray-300 rounded-xl " type="password"
                                wire:model='password_confirmation' required placeholder="••••••••" />
                        </div>

                        <!-- Password Requirements -->
                        <div class="text-xs text-gray-600">
                            <p class="mb-1 font-semibold">Password must contain:</p>
                            <ul class="space-y-1 list-disc list-inside">
                                <li>At least 8 characters</li>
                                <li>At least one uppercase letter</li>
                                <li>At least one lowercase letter</li>
                                <li>At least one number or special character</li>
                            </ul>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-sky-500 to-cyan-500 hover:from-sky-600 hover:to-cyan-600 text-white font-bold py-4 px-6 rounded-xl transition duration-300 transform hover:scale-[1.02]">
                            <span wire:loading.remove>Reset Password</span>
                            <span wire:loading>
                                <svg class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" fill="none"
                                    viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Processing...
                            </span>
                        </button>

                        <!-- Back to Login -->
                        <p class="text-sm text-center text-gray-600">
                            Remember your password?
                            <a href="{{ route('login') }}"
                                class="font-semibold underline text-sky-600 hover:text-sky-500">
                                Sign in
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
