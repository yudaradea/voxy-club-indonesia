@props(['id' => null, 'maxWidth' => null])

<x-ui.modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="flex items-center justify-between pb-4 border-b-2">
            <div class="text-lg font-medium text-gray-900">
                {{ $title }}
            </div>
            <x-ui.button-close-modal />
        </div>

        <div class="mt-4 text-sm text-gray-600">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-end px-6 py-4 mt-4 bg-gray-100 text-end">
        {{ $footer }}
    </div>
</x-ui.modal>
