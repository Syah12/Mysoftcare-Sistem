<?php

namespace App\Livewire\University\Forms;

use App\Livewire\BaseForm;
use App\Models\University;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Livewire\Component;

class UniversityForm extends BaseForm
{
    public ?University $university = null;

    public function mount()
    {
        $this->university ??= new University();
        $this->data = $this->university->toArray();
        $this->form->fill($this->data);
    }

    public function form(Form $form): Form
    {
        $universityData = Section::make('Institusi')
            ->description('Maklumat mengenai institusi')
            ->schema([
                TextInput::make('name')->label('Nama Universiti/Sekolah')->required(),
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
                Radio::make('is_university')->label('Universiti/Sekolah?')->required()->options([
                    true => 'Universiti',
                    false => 'Sekolah'
                ])->inline()->helperText('Adakah institusi tersebut sekolah atau universiti? Pilih salah satu.')
            ]);

        return $form->schema([
            $universityData,
        ])->statePath('data')->inlineLabel();
    }

    public function save()
    {
        $this->form->getState();
        $this->university->fill([
            ...$this->data,
        ])->save();

        Notification::make()
            ->title('Berjaya')
            ->body('Maklumat berjaya disimpan')
            ->success()
            ->color('success')
            ->seconds(3)
            ->send();

        return to_route('university.index');
    }
}
