<div class="p-4 bg-gray-100 rounded-lg">
    <h3 class="mb-2 text-lg font-bold">Preview Email</h3>
    <iframe
        srcdoc="{{ view('emails.event-scheduled', ['event' => $event, 'member' => auth()->user()->member])->render() }}"
        class="w-full border rounded-lg h-96"></iframe>
</div>
