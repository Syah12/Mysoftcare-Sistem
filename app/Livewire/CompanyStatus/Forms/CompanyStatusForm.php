<?php

namespace App\Livewire\CompanyStatus\Forms;

use App\Livewire\BaseForm;
use App\Livewire\CompanyStatus\Modals\FormModal;
use App\Models\CompanyStatus;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;

class CompanyStatusForm extends BaseForm
{
    public ?CompanyStatus $companyStatus = null;

    public function mount()
    {
        $this->companyStatus ??= new CompanyStatus();
        $this->data = $this->companyStatus->toArray();
        $this->form->fill($this->data);
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            ToggleButtons::make('flag')->label('Syarikat ditutup pada hari ini?')->inline()->required()
                ->options([
                    true    => 'Ya',
                    false   => 'Tidak',
                ])
                ->colors([
                    true => 'info',
                    false => 'danger',
                ])
                ->live()
                ->afterStateUpdated(function (Get $get, Set $set) {
                    if ($get('flag') == false) {
                        $set('description', null);
                    }
                }),
            Textarea::make('description')->label('Penerangan')->required(fn (Get $get) => $get('flag'))
                ->hidden(fn (Get $get) => $get('flag') != true)
        ])->statePath('data');
    }

    public function save()
    {
        $this->form->getState();
        $this->companyStatus->fill([
            ...$this->data,
        ])->save();

        Notification::make()
            ->title('Berjaya')
            ->body('Maklumat berjaya disimpan')
            ->success()
            ->color('success')
            ->seconds(3)
            ->send();

        return to_route('dashboard');
    }
}
