<?php

namespace App\Livewire\Agency\Forms;

use App\Livewire\BaseForm;
use App\Models\Agency;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Livewire\Component;

class AgencyForm extends BaseForm
{
    public ?Agency $agency = null;

    public function mount()
    {
        $this->agency ??= new Agency();
        $this->data = $this->agency->toArray();
        $this->form->fill($this->data);
    }

    public function form(Form $form): Form
    {
        $agencyData = Section::make('Agensi')
            ->description('Maklumat mengenai agensi')
            ->schema([
                TextInput::make('name')->label('Nama Agensi')->required(),
                TextInput::make('phone_number')->label('No. Telefon'),
                TextInput::make('email')->label('E-mel'),
                TextInput::make('address')->label('Alamat')->required(),
                TextInput::make('postcode')->label('Poskod')->numeric()->required(),
                TextInput::make('state')->label('Negeri')->required(),
                TextInput::make('district')->label('Daerah')->required(),
                Select::make('country')->label('Negara')->options([
                    'Malaysia' => 'Malaysia',
                    'Indonesia' => 'Indonesia'
                ])->searchable()->required(),
            ]);

        return $form->schema([
            $agencyData,
        ])->statePath('data')->inlineLabel();
    }

    public function save()
    {
        $this->form->getState();
        $this->agency->fill([
            ...$this->data,
        ])->save();

        Notification::make()
            ->title('Berjaya')
            ->body('Maklumat berjaya disimpan')
            ->success()
            ->color('success')
            ->seconds(3)
            ->send();

        return to_route('agency.index');
    }
}
