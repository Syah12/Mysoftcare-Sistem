<?php

namespace App\Livewire\CompanyStatus\Pages;

use App\Livewire\CompanyStatus\Modals\FormModal;
use App\Models\CompanyStatus;
use Carbon\Carbon;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class IndexPage extends Component implements HasForms, HasActions
{
    use InteractsWithForms, InteractsWithActions;

    public ?CompanyStatus $companyStatus = null;

    public function create()
    {
        $this->dispatch('show')->to(FormModal::class);
    }

    public function edit($id)
    {
        $this->dispatch('show', $id)->to(FormModal::class);
    }

    public function render()
    {
        $companyStatusMysoftcare = CompanyStatus::latest()->paginate(1);
        $now = Carbon::now();
        return view('livewire.company-status.pages.index-page', compact([
            'companyStatusMysoftcare',
            'now'
        ]));
    }
}
