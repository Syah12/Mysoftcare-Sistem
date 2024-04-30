<?php

namespace App\Livewire\CalendarEvents\Modals;

use App\Models\CalendarEvent;
use Livewire\Attributes\On;
use Livewire\Component;

class FormModal extends Component
{
    public ?int $eventId = null;
    public ?string $startDate = null;
    public ?string $endDate = null;

    public ?CalendarEvent $calendarEvent;

    #[On('show')]
    public function show($eventId, $startDate, $endDate)
    {
        $this->eventId = $eventId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->calendarEvent = CalendarEvent::findOrNew($this->eventId);
        $this->dispatch('open-modal', id: 'calendar-event-form-modal');
    }

    public function render()
    {
        return view('livewire.calendar-events.modals.form-modal');
    }
}
