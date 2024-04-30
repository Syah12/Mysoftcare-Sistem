<?php

namespace App\Livewire\Calendar\Tables;

use App\Models\Calendar;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class CalendarTable extends Component
{

    public function newEvent($title, $startDate, $endDate)
    {
        $validated = Validator::make(
            [
                'title' => $title,
                'start_time' => $startDate,
                'end_time' => $endDate,
            ],
            [
                'title' => 'required|min:1|max:40',
                'start_time' => 'required',
                'end_time' => 'required',
            ]
        )->validate();

        $event = Calendar::create(
            $validated
        );

        return $event->id;
    }

    public function updateEvent($id, $title, $startDate, $endDate)
    {
        $validated = Validator::make(
            [
                'start_time' => $startDate,
                'end_time' => $endDate,
            ],
            [
                'start_time' => 'required',
                'end_time' => 'required',
            ]
        )->validate();

        Calendar::findOrFail($id)->update($validated);
    }

    public function render()
    {
        $events = [];

        foreach (Calendar::all() as $event) {
            $events[] =  [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start_time->toIso8601String(),
                'end' => $event->end_time->toIso8601String(),
            ];
        }

        return view('livewire.calendar.tables.calendar-table', [
            'events' => $events
        ]);
    }
}
