<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\EventSchedule;
use Carbon\Carbon;
use Illuminate\Support\Str;

class EventSchedlue extends Component
{
    public $currentMonth, $currentYear;
    public $eventsByDay = [];
    public $featuredEvents = [];

    public function mount()
    {
        $this->currentMonth = now()->month;
        $this->currentYear  = now()->year;
        $this->loadEvents();
    }

    public function previousMonth()
    {
        $date = Carbon::create($this->currentYear, $this->currentMonth)->subMonth();
        $this->currentMonth = $date->month;
        $this->currentYear  = $date->year;
        $this->loadEvents();
    }

    public function nextMonth()
    {
        $date = Carbon::create($this->currentYear, $this->currentMonth)->addMonth();
        $this->currentMonth = $date->month;
        $this->currentYear  = $date->year;
        $this->loadEvents();
    }

    public function loadEvents()
    {
        $events = EventSchedule::query()
            ->whereMonth('start_date', $this->currentMonth)
            ->whereYear('start_date', $this->currentYear)
            ->orderBy('start_date')
            ->get();

        $this->eventsByDay = [];
        foreach ($events as $ev) {
            $day = Carbon::parse($ev->start_date)->day;
            $this->eventsByDay[$day][] = $ev;
        }

        $this->featuredEvents = EventSchedule::where('featured', true)
            ->orderBy('start_date')
            ->limit(1)
            ->get();
    }

    public function getEventStatus($event)
    {
        $now = now();
        if ($event->end_date && $event->end_date < $now) return 'past';
        if ($event->start_date > $now) return 'upcoming';
        return 'ongoing';
    }

    public function getStatusColor($status)
    {
        return [
            'upcoming' => 'bg-sky-100 text-sky-700',
            'ongoing'  => 'bg-green-100 text-green-700',
            'past'     => 'bg-gray-100 text-gray-600',
        ][$status] ?? 'bg-gray-100 text-gray-600';
    }

    public function render()
    {
        $date = Carbon::create($this->currentYear, $this->currentMonth);
        return view('livewire.event-schedlue', [
            'daysInMonth'    => $date->daysInMonth,
            'firstDayOfWeek' => $date->startOfMonth()->dayOfWeek,
            'monthName'      => $date->format('F Y'),
            'eventsByDay'    => $this->eventsByDay,
            'featuredEvents' => $this->featuredEvents,
        ]);
    }
}
