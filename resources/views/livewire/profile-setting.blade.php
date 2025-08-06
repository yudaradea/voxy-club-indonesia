<div x-data="{ activeTab: 'profile' }"
    class="min-h-screen pt-2 pb-12 lg:py-12 bg-gradient-to-br from-sky-100 via-blue-50 to-indigo-100">

    <div class="container px-4 mx-auto max-w-7xl">
        <!-- Tabs -->
        <div class="p-6 mt-10 shadow-lg bg-white/60 backdrop-blur-sm rounded-2xl">
            <div class="border-b border-gray-300">
                <nav class="flex space-x-6">
                    <button @click="activeTab = 'profile'"
                        :class="activeTab === 'profile' ? 'border-sky-500 text-sky-600' :
                            'border-transparent text-gray-500'"
                        class="pb-2 text-sm font-semibold transition border-b-2">Personal Information</button>
                    <button @click="activeTab = 'password'"
                        :class="activeTab === 'password' ? 'border-sky-500 text-sky-600' :
                            'border-transparent text-gray-500'"
                        class="pb-2 text-sm font-semibold transition border-b-2">Ubah Password</button>
                </nav>
            </div>

            <!-- Content -->
            <div class="mt-6">
                <!-- Profile -->
                <div x-show="activeTab === 'profile'" x-transition>
                    <form wire:submit.prevent="update({{ $userMember->id }})" class="space-y-6">
                        <!-- Personal Details -->
                        <div>
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

                            </div>
                        </div>

                        <!-- Identity Verification -->
                        <div>

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
                                    <x-ui.input type="number" wire:model="form.vehicle_year" placeholder="2023"
                                        required />
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

                            <x-ui.label>Full Address</x-ui.label>
                            <x-ui.textarea wire:model="form.address" placeholder="Jl. Merdeka No. 123, Jakarta"
                                required></x-ui.textarea>
                            @error('form.address')
                                <p class="mt-1 text-sm italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Reason -->
                        <div>

                            <x-ui.label>Reason</x-ui.label>
                            <x-ui.textarea wire:model="form.reason" placeholder="Share your passion for cars..."
                                required></x-ui.textarea>
                            @error('form.reason')
                                <p class="mt-1 text-sm italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Documents -->
                        <div class="lg:pb-4">

                            <div class="grid gap-4 md:grid-cols-3">
                                <div class="text-center">
                                    <x-ui.label>Profile Photo</x-ui.label>
                                    <x-ui.file-upload name="form.profile_photo" class="border-gray-600"
                                        :existing-photo-url="$userMember->member->fotoProfil()" />
                                    <p class="mt-1 text-xs text-slate-700">Clear face photo</p>
                                    @error('form.profile_photo')
                                        <p class="mt-1 text-sm italic text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <x-ui.label>STNK Photo</x-ui.label>
                                    <x-ui.file-upload name="form.stnk_photo" class="border-gray-600"
                                        :existing-photo-url="$userMember->member->fotoSTNK()" />
                                    <p class="mt-1 text-xs text-slate-700">Clear & Readable</p>
                                    @error('form.stnk_photo')
                                        <p class="mt-1 text-sm italic text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <x-ui.label>Vehicle Photo</x-ui.label>
                                    <x-ui.file-upload name="form.car_photo" class="border-gray-600" :existing-photo-url="$userMember->member->fotoMobil()" />
                                    <p class="mt-1 text-xs text-slate-700">Side view preferred</p>
                                    @error('form.car_photo')
                                        <p class="mt-1 text-sm italic text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <x-ui.button-submit title="Update Profile" />
                    </form>
                </div>

                <!-- Uang Kas (striped table) -->
                <div x-show="activeTab === 'password'" x-transition>
                    <form wire:submit.prevent="updatePassword({{ $userMember->id }})" class="space-y-6">
                        <!-- Personal Details -->
                        <div>
                            <div class="flex flex-col gap-4 ">
                                <div>
                                    <x-ui.label>Current Password</x-ui.label>
                                    <x-ui.input-password wire:model="form.current_password" required />
                                    @error('form.current_password')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <x-ui.label>New Password</x-ui.label>
                                    <x-ui.input-password wire:model="form.new_password" required />
                                    @error('form.new_password')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <x-ui.label>Password Confirmation</x-ui.label>
                                    <x-ui.input-password wire:model="form.new_password_confirmation" required />
                                    @error('form.new_password_confirmation')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>


                            </div>
                        </div>

                        <!-- Submit -->
                        <x-ui.button-submit title="Update Password" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
