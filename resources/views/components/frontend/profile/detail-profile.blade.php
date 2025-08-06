<div class="p-5 mb-6 border border-gray-200 rounded-2xl lg:p-6">
    <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
        <div>
            <h4 class="text-lg font-semibold text-gray-800 lg:mb-6">
                Personal Information
            </h4>

            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32">
                <div>
                    <p class="mb-2 text-xs leading-normal text-gray-500 ">
                        Nama Lengkap
                    </p>
                    <p class="text-sm font-medium text-gray-800 ">
                        {{ ucfirst($user->name) }}
                    </p>
                </div>

                <div>
                    <p class="mb-2 text-xs leading-normal text-gray-500 ">
                        Email address
                    </p>
                    <p class="text-sm font-medium text-gray-800 ">
                        {{ $user->email }}
                    </p>
                </div>

                <div>
                    <p class="mb-2 text-xs leading-normal text-gray-500 ">
                        Phone
                    </p>
                    <p class="text-sm font-medium text-gray-800 ">
                        {{ formatWhatsapp($user->member->phone) }}
                    </p>

                </div>

                <div>
                    <p class="mb-2 text-xs leading-normal text-gray-500 ">
                        KTP/SIM
                    </p>
                    <p class="text-sm font-medium text-gray-800 ">
                        {{ $user->member->ktp_sim }}
                    </p>
                </div>

                <div>
                    <p class="mb-2 text-xs leading-normal text-gray-500 ">
                        Tempat dan Tanggal Lahir
                    </p>
                    <p class="text-sm font-medium text-gray-800 ">
                        {{ $user->member->birth_place }}
                        {{ Carbon::parse($user->member->birth_date)->format('d F Y') }}
                    </p>
                </div>

                <div>
                    <p class="mb-2 text-xs leading-normal text-gray-500 ">
                        Alamat
                    </p>
                    <p class="text-sm font-medium text-gray-800 ">
                        {{ $user->member->address }}
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="p-5 border border-gray-200 rounded-2xl lg:p-6">
    <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
        <div>
            <h4 class="text-lg font-semibold text-gray-800 lg:mb-6">
                Vehicle Information
            </h4>

            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-7 2xl:gap-x-32">
                <div>
                    <p class="mb-2 text-xs leading-normal text-gray-500 ">
                        Tipe Mobil
                    </p>
                    <p class="text-sm font-medium text-gray-800 ">
                        {{ $user->member->vehicle_type }}
                    </p>
                </div>
                <div>
                    <p class="mb-2 text-xs leading-normal text-gray-500 ">
                        Warna Mobil
                    </p>
                    <p class="text-sm font-medium text-gray-800 ">
                        {{ $user->member->vehicle_color }}
                    </p>
                </div>
                <div>
                    <p class="mb-2 text-xs leading-normal text-gray-500 ">
                        Tahun Mobil
                    </p>
                    <p class="text-sm font-medium text-gray-800 ">
                        {{ $user->member->vehicle_year }}
                    </p>
                </div>

                <div>
                    <p class="mb-2 text-xs leading-normal text-gray-500 ">
                        Plat Nomor
                    </p>
                    <p class="text-sm font-medium text-gray-800 ">
                        {{ $user->member->license_plate }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
