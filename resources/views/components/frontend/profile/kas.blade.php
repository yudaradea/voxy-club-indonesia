<div class="relative overflow-x-auto sm:rounded-lg">

    <div class="flex justify-end w-full pb-2">
        <div class="w-24">
            <select wire:model.live="perPage"
                class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>

    <div class="relative overflow-x-auto">
        <table class="w-full lg:min-w-[600px] text-sm text-left text-gray-500 whitespace-nowrap">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3 ">Amount</th>
                    <th class="px-4 py-3 ">Notes</th>
                    <th class="px-4 py-3 ">Paid At</th>
                    <th class="px-4 py-3 ">Proof Image</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kasHistory as $kas)
                    <tr class="border-b odd:bg-white even:bg-gray-100">

                        <td class="px-4 py-3 font-medium text-slate-800 whitespace-nowrap">
                            {{ $kas->member->user->name }}
                        </td>
                        <td class="px-4 py-3 font-medium text-slate-800 ">
                            Rp{{ formatRupiah($kas->amount) }}
                        </td>
                        <td class="px-4 py-3">
                            <p class="p-1 text-sm rounded-lg shadow-sm bg-sky-100 text-sky-600 w-fit">
                                {{ $kas->notes }}</p>
                        </td>
                        <td class="px-4 py-3">
                            <p class="text-slate-800">
                                {{ formatTanggal($kas->paid_at) }}</p>
                        </td>
                        <td class="px-4 py-3 ">
                            <img class="object-cover w-10 h-10 cursor-pointer rounded-xl"
                                src="{{ Storage::url($kas->proof_image) }}" alt="avatar"
                                @click="$dispatch('open-image-modal', '{{ Storage::url($kas->proof_image) }}')">
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-3 text-center text-red-600 bg-gray-200">Data Not Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="pt-8">
        {{-- {{ $users->links() }} --}}
    </div>

</div>
