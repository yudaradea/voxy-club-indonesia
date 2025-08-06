<div class="flex justify-end pt-4 border-t-2 border-slate-500">
    <button type="submit"
        class="flex items-center px-6 bg-gradient-to-r from-sky-500 to-sky-600 hover:from-sky-600 hover:to-sky-700 text-white font-bold py-3 rounded-xl shadow-lg transition transform hover:scale-[1.02]">
        <span wire:loading.remove>{{ $title }}</span>

        <!-- Tambahkan "flex items-center" di bawah -->
        <div wire:loading class="animate-spin">
            <i class="text-2xl ti ti-loader-2"></i>
        </div>
    </button>
</div>
