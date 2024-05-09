<?php

namespace App\Livewire\PIC\Forms;

use App\Livewire\BaseForm;
use App\Models\Agency;
use App\Models\PIC;
use App\Models\Position;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Livewire\Component;

class PICForm extends BaseForm
{
    public ?PIC $pic = null;

    public function mount()
    {
        $this->pic ??= new PIC();
        $this->data = $this->pic->toArray();
        $this->form->fill($this->data);
    }

    public function form(Form $form): Form
    {
        $picData = Section::make('PIC Agensi')
            ->description('Maklumat mengenai PIC agensi')
            ->schema([
                TextInput::make('name')->label('Nama Penuh PIC')->required(),
                TextInput::make('phone_number')->label('No. Telefon'),
                Select::make('agency_id')->label('Agensi PIC')
                    ->options(Agency::pluck('name', 'id'))
                    ->searchable()
                    ->native(false)
                    ->required(),
                Select::make('position_id')->label('Jawatan PIC')
                    ->options(Position::pluck('name', 'id'))
                    ->searchable()
                    ->native(false)
                    ->required(),
            ]);

        return $form->schema([
            $picData,
        ])->statePath('data')->inlineLabel();
    }

    public function save()
    {
        $this->form->getState();
        $this->pic->fill([
            ...$this->data,
        ])->save();

        Notification::make()
            ->title('Berjaya')
            ->body('Maklumat berjaya disimpan')
            ->success()
            ->color('success')
            ->seconds(3)
            ->send();

        return to_route('pic.index');
    }
}
