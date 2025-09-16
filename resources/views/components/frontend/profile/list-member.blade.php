@if (auth()->user()->member->status === 'verified')
    <div class="relative overflow-x-auto sm:rounded-lg">
        <div class="flex flex-col items-center justify-between gap-4 p-4 md:flex-row d md:gap-0">
            <div class="flex items-center w-full gap-4 lg:justify-end">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input wire:model.live.debounce.300ms="search" type="text"
                        class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500"
                        placeholder="Search" required="" />
                </div>
                <div class="flex items-center w-24 space-x-4">
                    <select wire:model.live="perPage"
                        class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>

        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 whitespace-nowrap">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3 ">Foto</th>
                        <th class="px-4 py-3 ">Position</th>
                        <th class="px-4 py-3 ">Phone</th>
                        <th class="px-4 py-3">No Pol</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="border-b odd:bg-white even:bg-gray-100">

                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap ">
                                {{ $user->name }}
                            </td>

                            <td class="px-4 py-3">
                                <div class="w-10 h-10 overflow-hidden rounded-full">
                                    <img class="object-cover w-full h-full cursor-pointer"
                                        src="{{ Storage::url($user->member->profile_photo) }}" alt="avatar"
                                        @click="$dispatch('open-image-modal', '{{ Storage::url($user->member->profile_photo) }}')">
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <p class="p-1 text-sm rounded-lg shadow-sm bg-sky-100 text-sky-600 w-fit">
                                    {{ ucfirst($user->member->jabatan) }}</p>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">{{ formatWhatsapp($user->member->phone) }}</td>
                            <td class="px-4 py-3 whitespace-nowrap">{{ $user->member->license_plate }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-3 text-center text-red-600">Data Not Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="pt-8">
            {{ $users->links() }}
        </div>

    </div>
@else
    <div
        class="flex items-stretch gap-3 p-4 mt-6 border-l-4 shadow bg-amber-100 border-amber-500 text-amber-800 rounded-r-xl">
        <svg class="self-center w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
        </svg>
        <div>
            <p class="font-bold">Akun belum terverifikasi</p>
            <p class="text-sm">Hanya akun yang sudah terverifikasi yang dapat melihat list anggota</p>
        </div>
    </div>
@endif
