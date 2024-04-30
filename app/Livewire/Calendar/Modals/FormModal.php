<?php

namespace App\Livewire\Calendar\Modals;

use Livewire\Attributes\On;
use Livewire\Component;

class FormModal extends Component
{
    public ?int $eventId = null;
    public ?string $startDate = null;
    public ?string $endDate = null;

    #[On('show')]
    public function show($eventId, $startDate, $endDate)
    {
        $this->eventId = $eventId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->dispatch('open-modal', id: 'calendar-form-modal');
    }

    public function render()
    {
        return view('livewire.calendar.modals.form-modal');
    }
}
