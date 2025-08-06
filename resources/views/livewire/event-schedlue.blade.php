<div class="py-16 pb-20 bg-gradient-to-br from-slate-50 via-white to-sky-50/50 ">
    <div class="container px-6 mx-auto ">
        <div class="mb-8 text-center">
            <h2
                class="text-3xl font-bold text-transparent md:text-4xl bg-gradient-to-r from-slate-800 to-sky-600 bg-clip-text">
                Our Schedule
            </h2>
        </div>

        {{-- Featured Event (1 only) --}}
        @if ($featuredEvents->isNotEmpty())
            @php $event = $featuredEvents->first(); @endphp
            <div class="mb-10">
                <h3 class="mb-4 text-xl font-bold">⭐ Featured Event</h3>
                <a href="{{ route('event.schedule.show', $event->slug) }}"
                    class="block overflow-hidden transition bg-white shadow rounded-xl hover:shadow-lg">
                    <img src="{{ Storage::url($event->image) }}" class="object-cover w-full h-48 lg:h-72">
                    <div class="p-6">
                        <div class="flex items-start justify-between">
                            <h4 class="text-lg font-bold">{{ $event->title }}</h4>
                            <span
                                class="text-xs px-2 py-1 rounded-full {{ $this->getStatusColor($this->getEventStatus($event)) }}">
                                {{ ucfirst($this->getEventStatus($event)) }}
                            </span>
                        </div>
                        <p class="mt-2 text-sm text-gray-600">
                            {{ formatTanggalFull($event->start_date) }}
                        </p>
                        <p class="mt-2 text-sm text-gray-700">{!! Str::limit($event->description, 100) !!}</p>
                        <div class="mt-4 text-center">
                            <span class="text-sm font-semibold text-sky-600">Read more →</span>
                        </div>
                    </div>
                </a>
            </div>
        @endif

        {{-- Calendar & List --}}
        <div class="grid gap-8 md:grid-cols-2">
            {{-- Calendar --}}
            <div class="p-6 bg-white shadow-lg rounded-2xl">
                <h3 class="mb-4 text-2xl font-bold">{{ $monthName }}</h3>
                <div class="flex items-center justify-between mb-4">
                    <button wire:click="previousMonth" class="p-2 bg-gray-100 rounded-full hover:bg-gray-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button wire:click="nextMonth" class="p-2 bg-gray-100 rounded-full hover:bg-gray-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

                <div class="grid grid-cols-7 gap-px bg-gray-100">
                    @foreach (['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $day)
                        <div class="p-2 font-bold text-center text-gray-600 bg-gray-50">{{ $day }}</div>
                    @endforeach

                    @for ($i = 0; $i < $firstDayOfWeek; $i++)
                        <div class="p-2 bg-gray-50"></div>
                    @endfor

                    @for ($day = 1; $day <= $daysInMonth; $day++)
                        @php
                            $hasEvents = isset($eventsByDay[$day]);
                            $firstEvent = $hasEvents ? $eventsByDay[$day][0] : null;
                            $status = $hasEvents ? $this->getEventStatus($firstEvent) : null;
                            $bgClass = $status ? $this->getStatusColor($status) : 'bg-white hover:bg-gray-50';
                        @endphp
                        <div class="relative p-2 text-center cursor-pointer group transition {{ $bgClass }}">
                            <span class="text-sm font-medium">{{ $day }}</span>
                            @if ($hasEvents)
                                <div
                                    class="absolute left-0 z-10 hidden max-w-xs p-3 mt-1 text-xs text-white bg-gray-800 rounded shadow-lg group-hover:block w-max">
                                    @foreach ($eventsByDay[$day] as $ev)
                                        <div class="mb-2">
                                            <strong>{{ $ev->title }}</strong><br>
                                            <span class="text-sky-300">{{ formatTanggalHari($ev->start_date) }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endfor

                    @for ($i = ($daysInMonth + $firstDayOfWeek) % 7; $i > 0 && $i < 7; $i++)
                        <div class="p-2 bg-gray-50"></div>
                    @endfor
                </div>
            </div>

            {{-- Event List --}}
            <div class="space-y-4">
                @php
                    $allEvents = collect($eventsByDay)->flatten()->sortBy('start_date');
                @endphp

                @forelse($allEvents as $event)
                    @php $status = $this->getEventStatus($event); @endphp
                    <div class="p-4 transition bg-white shadow rounded-xl hover:shadow-lg">
                        <div class="flex items-stretch">
                            <div class="flex-1">
                                <div class="flex items-start justify-between">
                                    <h4 class="font-bold text-gray-800">{{ $event->title }}</h4>
                                    <span class="text-xs px-2 py-1 rounded-full {{ $this->getStatusColor($status) }}">
                                        {{ ucfirst($status) }}
                                    </span>
                                </div>
                                <p class="mt-1 text-sm text-gray-600">
                                    {{ formatTanggal($event->start_date) }}
                                    @if ($event->location)
                                        <br><span class="text-xs text-gray-500">📍
                                            {{ $event->location }}</span>
                                    @endif
                                </p>
                                <p class="mt-2 prose text-gray-700 prose-p:text-sm lg:prose-p:text-base max-w-none">
                                    {!! Str::limit($event->description, 100) !!}</p>
                                <div class="mt-3 text-center">
                                    <a href="{{ route('event.schedule.show', $event->slug) }}"
                                        class="text-sm font-semibold text-sky-600">Read more →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="flex flex-col items-center justify-center h-full py-8 text-center text-gray-500">
                        <svg class="w-12 h-12 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p>No events this month</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
