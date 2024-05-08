<?php

namespace App\Livewire\Position\Forms;

use App\Livewire\BaseForm;
use App\Models\Position;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Livewire\Component;

class PositionForm extends BaseForm
{
    public ?Position $position = null;

    public function mount()
    {
        $this->position ??= new Position();
        $this->data = $this->position->toArray();
        $this->form->fill($this->data);
    }

    public function form(Form $form): Form
    {
        $positionData = Section::make('Jawatan')
            ->description('Maklumat mengenai jawatan')
            ->schema([
                TextInput::make('name')->label('Jawatan')->required()
            ]);

        return $form->schema([
            $positionData,
        ])->statePath('data')->inlineLabel();
    }

    public function save()
    {
        $this->form->getState();
        $this->position->fill([
            ...$this->data,
        ])->save();

        Notification::make()
            ->title('Berjaya')
            ->body('Maklumat berjaya disimpan')
            ->success()
            ->color('success')
            ->seconds(3)
            ->send();

        return to_route('position.index');
    }
}
