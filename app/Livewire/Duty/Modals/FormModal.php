<?php

namespace App\Livewire\Duty\Modals;

use Livewire\Attributes\On;
use Livewire\Component;

class FormModal extends Component
{
    #[On('show')]
    public function show()
    {
        $this->dispatch('open-modal', id: 'duty-form-modal');
    }

    public function render()
    {
        return view('livewire.duty.modals.form-modal');
    }
}
