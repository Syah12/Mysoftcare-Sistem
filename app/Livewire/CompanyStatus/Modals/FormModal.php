<?php

namespace App\Livewire\CompanyStatus\Modals;

use App\Models\CompanyStatus;
use Livewire\Attributes\On;
use Livewire\Component;

class FormModal extends Component
{
    public ?CompanyStatus $companyStatus = null;

    #[On('show')]
    public function show(?int $id = null)
    {
        $this->companyStatus = $id ? CompanyStatus::findOrFail($id) : new CompanyStatus();
        $this->dispatch('open-modal', id: 'company-status-form-modal');
    }

    public function render()
    {
        return view('livewire.company-status.modals.form-modal');
    }
}
