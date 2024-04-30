<?php

namespace App\Livewire\Calendar\Forms;

use App\Livewire\BaseForm;
use App\Models\Calendar;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;

class CalendarForm extends BaseForm
{
    public ?int $eventId = null;
    public ?Calendar $calendarEvent;

    public function mount()
    {
        $this->calendarEvent = Calendar::findOrNew($this->eventId);
        $this->data = $this->calendarEvent->toArray();
        $this->form->fill($this->data);
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')
                ->label('Tajuk'),
            DateTimePicker::make('start_time')
                ->label('Tarikh Dari')
                ->timezone('Asia/Kuala_Lumpur')
                ->native(false)
                ->weekStartsOnSunday()
                ->prefix('Mula'),
            DateTimePicker::make('end_time')
                ->label('Tarikh Hingga')
                ->timezone('Asia/Kuala_Lumpur')
                ->native(false)
                ->weekStartsOnSunday()
                ->prefix('Tamat'),
        ])->statePath('data');
    }

    public function save()
    {
        $this->form->getState();
        $this->calendarEvent->fill([
            ...$this->data,
        ])->save();

        Notification::make()
            ->title('Berjaya')
            ->body('Maklumat berjaya disimpan')
            ->success()
            ->color('success')
            ->seconds(3)
            ->send();

        return to_route('calendar.index'); /* todo: toroute */
    }
}
