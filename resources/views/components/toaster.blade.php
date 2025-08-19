<div x-data="toaster()" class="fixed z-50 space-y-2 top-5 right-5">
    <template x-for="(toast, index) in toasts" :key="index">
        <div x-show="toast.show" x-transition
            :class="{
                'bg-green-500': toast.type === 'success',
                'bg-red-500': toast.type === 'error',
                'bg-yellow-500': toast.type === 'warning',
                'bg-blue-500': toast.type === 'info',
            }"
            class="max-w-sm px-4 py-3 text-white rounded shadow-md">
            <span x-text="toast.message"></span>
            <button @click="removeToast(index)" class="ml-2 text-sm font-bold">×</button>
        </div>
    </template>
</div>

<script>
    function toaster() {
        return {
            toasts: [],
            init() {
                Livewire.on('toast', (data) => {
                    this.addToast(data.type, data.message);
                });
            },
            addToast(type, message) {
                const toast = {
                    type,
                    message,
                    show: true
                };
                this.toasts.push(toast);
                setTimeout(() => {
                    this.removeToast(this.toasts.indexOf(toast));
                }, 3000);
            },
            removeToast(index) {
                this.toasts.splice(index, 1);
            }
        };
    }
</script>
