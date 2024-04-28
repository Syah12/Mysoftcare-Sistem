<?php

namespace App\Livewire\Duty\Pages;

use App\Livewire\Duty\Modals\FormModal;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class IndexPage extends Component implements HasForms, HasActions
{
    use InteractsWithForms, InteractsWithActions;

    public function create()
    {
        $this->dispatch('show')->to(FormModal::class);
    }

    public function render()
    {
        return view('livewire.duty.pages.index-page');
    }
}
