<div
    class="flex items-center justify-center min-h-screen py-12 bg-gradient-to-br from-sky-100 via-blue-50 to-indigo-100">

    <div class="w-full max-w-5xl p-4">
        <div class="p-8 shadow-2xl bg-white/80 backdrop-blur-xl rounded-3xl">

            <!-- Title -->
            <h1 class="mb-2 text-4xl font-bold text-center text-gray-800">Join Our Car Community</h1>
            <p class="mb-8 text-center text-gray-600">Step <span x-text="$wire.step"></span> of 2</p>

            <!-- Progress Bar -->
            <div class="w-full h-2 mb-8 bg-gray-200 rounded-full">
                <div class="h-2 transition-all duration-500 rounded-full bg-sky-500"
                    :style="$wire.step === 1 ? 'width: 50%' : 'width: 100%'"></div>
            </div>

            <!-- Step 1: Terms & Policy -->
            <div x-show="$wire.step === 1" x-transition>
                <h2 class="mb-4 text-2xl font-semibold text-gray-800">📜 Terms & Policy</h2>
                <div class="p-4 space-y-4 overflow-y-auto text-sm text-gray-700 bg-gray-100 rounded-xl max-h-72">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur.</p>
                </div>

                <div class="flex items-center mt-6">
                    <input type="checkbox" wire:model="agreed" id="agree"
                        class="mr-3 rounded text-sky-600 focus:ring-sky-500">
                    <label for="agree" class="text-sm text-gray-700">I agree to the Terms & Policy</label>
                </div>

                @if (Session::has('error'))
                    <p class="mt-2 text-sm text-red-500">{{ Session::get('error') }}</p>
                @endif

                <button wire:click="nextStep"
                    class="w-full py-3 mt-6 font-bold text-white transition shadow bg-sky-500 hover:bg-sky-600 rounded-xl">
                    Next →
                </button>
            </div>

            <!-- Step 2: Personal Information -->
            <div x-show="$wire.step === 2" x-transition>
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-2xl font-semibold text-gray-800">🧍 Personal Information</h2>
                    <button wire:click="previousStep"
                        class="flex items-center justify-center w-8 h-8 rounded-full bg-sky-100 text-sky-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                </div>

                <form wire:submit.prevent="submit" class="space-y-6">
                    <!-- Personal Details -->
                    <div>
                        <h4 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                            <span
                                class="flex items-center justify-center w-8 h-8 mr-3 text-sm rounded-full bg-sky-100 text-sky-600">1</span>
                            Personal Details
                        </h4>
                        <div class="grid gap-4 md:grid-cols-2">
                            <div>
                                <x-ui.label>Full Name</x-ui.label>
                                <x-ui.input wire:model="form.name" placeholder="Yosep Angga" required />
                                @error('form.name')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <x-ui.label>Email Address</x-ui.label>
                                <x-ui.input type="email" wire:model="form.email" placeholder="yosep@example.com"
                                    required />
                                @error('form.email')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <x-ui.label>Password</x-ui.label>
                                <x-ui.input-password wire:model="form.password" placeholder="••••••••" required />
                                @error('form.password')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <x-ui.label>Confirm Password</x-ui.label>
                                <x-ui.input-password wire:model="form.password_confirmation" placeholder="••••••••"
                                    required />
                                @error('form.password_confirmation')
                                    <p class="mt-1 text-sm italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Identity Verification -->
                    <div>
                        <h4 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                            <span
                                class="flex items-center justify-center w-8 h-8 mr-3 text-sm rounded-full bg-sky-100 text-sky-600">2</span>
                            Identity Verification
                        </h4>
                        <div class="grid gap-4 md:grid-cols-2">
                            <div>
                                <x-ui.label>ID Number / Driver's License</x-ui.label>
                                <x-ui.input type="number" wire:model="form.ktp_sim" placeholder="DL123456789"
                                    required />
                                @error('form.ktp_sim')
                                    <p class="mt-1 text-sm italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <x-ui.label>Phone</x-ui.label>
                                <x-ui.input type="number" wire:model="form.phone" placeholder="081234567890"
                                    required />
                                @error('form.phone')
                                    <p class="mt-1 text-sm italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <x-ui.label>Birth Place</x-ui.label>
                                <x-ui.input wire:model="form.birth_place" placeholder="Lebak" required />
                                @error('form.birth_place')
                                    <p class="mt-1 text-sm italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <x-ui.label>Birth Date</x-ui.label>
                                <x-ui.input type="date" wire:model="form.birth_date" required />
                                @error('form.birth_date')
                                    <p class="mt-1 text-sm italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Vehicle -->
                    <div>
                        <h4 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                            <span
                                class="flex items-center justify-center w-8 h-8 mr-3 text-sm rounded-full bg-sky-100 text-sky-600">3</span>
                            Your Vehicle
                        </h4>
                        <div class="grid gap-4 md:grid-cols-2">
                            <div>
                                <x-ui.label>Vehicle Type</x-ui.label>
                                <x-ui.select wire:model="form.vehicle_type" required>
                                    <option value="">Select Type</option>
                                    <option value="R 80">R 80</option>
                                    <option value="R 90">R 90</option>
                                </x-ui.select>
                                @error('form.vehicle_type')
                                    <p class="mt-1 text-sm italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <x-ui.label>Shirt Size</x-ui.label>
                                <x-ui.select wire:model="form.shirt_size" required>
                                    <option value="">Select Size</option>
                                    @foreach (['S', 'M', 'L', 'XL', 'XXL', 'XXXL'] as $size)
                                        <option value="{{ $size }}">{{ $size }}</option>
                                    @endforeach
                                </x-ui.select>
                                @error('form.shirt_size')
                                    <p class="mt-1 text-sm italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <x-ui.label>Vehicle Color</x-ui.label>
                                <x-ui.input wire:model="form.vehicle_color" placeholder="Midnight Blue" required />
                                @error('form.vehicle_color')
                                    <p class="mt-1 text-sm italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <x-ui.label>Year Manufactured</x-ui.label>
                                <x-ui.input type="number" wire:model="form.vehicle_year" placeholder="2023" required />
                                @error('form.vehicle_year')
                                    <p class="mt-1 text-sm italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="md:col-span-2">
                                <x-ui.label>License Plate</x-ui.label>
                                <x-ui.input wire:model="form.license_plate" placeholder="ABC-1234" required />
                                @error('form.license_plate')
                                    <p class="mt-1 text-sm italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Address -->
                    <div>
                        <h4 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                            <span
                                class="flex items-center justify-center w-8 h-8 mr-3 text-sm rounded-full bg-sky-100 text-sky-600">4</span>
                            Location
                        </h4>
                        <x-ui.label>Full Address</x-ui.label>
                        <x-ui.textarea wire:model="form.address" placeholder="Jl. Merdeka No. 123, Jakarta"
                            required></x-ui.textarea>
                        @error('form.address')
                            <p class="mt-1 text-sm italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Reason -->
                    <div>
                        <h4 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                            <span
                                class="flex items-center justify-center w-8 h-8 mr-3 text-sm rounded-full bg-sky-100 text-sky-600">5</span>
                            Tell Us About You
                        </h4>
                        <x-ui.label>Reason</x-ui.label>
                        <x-ui.textarea wire:model="form.reason" placeholder="Share your passion for cars..."
                            required></x-ui.textarea>
                        @error('form.reason')
                            <p class="mt-1 text-sm italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Documents -->
                    <div>
                        <h4 class="flex items-center mb-4 text-lg font-semibold text-gray-800">
                            <span
                                class="flex items-center justify-center w-8 h-8 mr-3 text-sm rounded-full bg-sky-100 text-sky-600">6</span>
                            Upload Documents
                        </h4>
                        <div class="grid gap-4 md:grid-cols-3">
                            <div class="text-center">
                                <x-ui.label>Profile Photo</x-ui.label>
                                <x-ui.file-upload name="form.profile_photo" class="border-gray-600" />
                                <p class="mt-1 text-xs text-slate-700">Clear face photo</p>
                                @error('form.profile_photo')
                                    <p class="mt-1 text-sm italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="text-center">
                                <x-ui.label>STNK Photo</x-ui.label>
                                <x-ui.file-upload name="form.stnk_photo" class="border-gray-600" />
                                <p class="mt-1 text-xs text-slate-700">Clear & Readable</p>
                                @error('form.stnk_photo')
                                    <p class="mt-1 text-sm italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="text-center">
                                <x-ui.label>Vehicle Photo</x-ui.label>
                                <x-ui.file-upload name="form.car_photo" class="border-gray-600" />
                                <p class="mt-1 text-xs text-slate-700">Side view preferred</p>
                                @error('form.vehicle_photo')
                                    <p class="mt-1 text-sm italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-sky-500 to-sky-600 hover:from-sky-600 hover:to-sky-700 text-white font-bold py-4 rounded-xl shadow-lg transition transform hover:scale-[1.02]">
                        <span wire:loading.remove>Complete Registration</span>
                        <span wire:loading>
                            <svg class="w-5 h-5 mr-2 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4" />
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" />
                            </svg>
                        </span>
                    </button>

                    <p class="text-sm text-center text-gray-600">
                        Already have an account?
                        <a href="{{ route('login') }}"
                            class="font-semibold underline text-sky-600 hover:text-sky-500">Sign in here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
