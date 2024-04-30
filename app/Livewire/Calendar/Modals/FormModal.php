<?php

namespace App\Livewire\Calendar\Modals;

use Livewire\Attributes\On;
use Livewire\Component;

class FormModal extends Component
{
    public ?int $eventId = null;

    #[On('show')]
    public function show($eventId)
    {
        $this->eventId = $eventId;
        $this->dispatch('open-modal', id: 'calendar-form-modal');
    }

    public function render()
    {
        return view('livewire.calendar.modals.form-modal');
    }
}
