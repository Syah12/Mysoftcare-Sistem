<?php

namespace App\Livewire\CalendarEvents\Libraries;

use App\Models\CalendarEvent;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;
use Livewire\Component;

class FullCalendarView extends Component
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

        $event = CalendarEvent::create(
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

        CalendarEvent::findOrFail($id)->update($validated);
    }

    public function render()
    {
        $events = [];

        foreach (CalendarEvent::all() as $event) {
            $events[] =  [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start_time->toIso8601String(),
                'end' => $event->end_time->toIso8601String(),
            ];
        }

        return view('livewire.calendar-events.libraries.full-calendar-view', [
            'events' => $events
        ]);
    }
}
