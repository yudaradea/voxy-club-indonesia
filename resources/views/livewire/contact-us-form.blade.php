<div>
    <form wire:submit="send" wire:recaptcha>
        <input wire:model.defer="name" type="text" placeholder="Your Name" required
            class="w-full px-4 py-3 text-white bg-gray-800 rounded-lg">
        @error('name')
            <span class="text-sm text-red-400">{{ $message }}</span>
        @enderror

        <input wire:model.defer="email" type="email" placeholder="Your Email" required
            class="w-full px-4 py-3 mt-3 text-white bg-gray-800 rounded-lg">
        @error('email')
            <span class="text-sm text-red-400">{{ $message }}</span>
        @enderror

        <textarea wire:model.defer="message" placeholder="Your Message" rows="4" required
            class="w-full px-4 py-3 mt-3 text-white bg-gray-800 rounded-lg"></textarea>
        @error('message')
            <span class="text-sm text-red-400">{{ $message }}</span>
        @enderror

        <!-- Error captcha -->
        @if ($errors->has('gRecaptchaResponse'))
            <div class="text-sm text-red-400">{{ $errors->first('gRecaptchaResponse') }}</div>
        @endif



        <button type="submit" wire:loading.attr="disabled"
            class="flex items-center justify-center w-full py-3 mt-4 font-semibold rounded-lg bg-gradient-to-r from-sky-500 to-cyan-500">

            {{-- Tampilan saat tidak loading --}}
            <span wire:loading.remove wire:target="send">
                Send Message
            </span>

            {{-- Tampilan saat loading (mengirim pesan) --}}
            <span wire:loading wire:target="send">
                <svg class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Sending...
            </span>
        </button>
    </form>

    @livewireRecaptcha
</div>
