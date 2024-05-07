<?php

namespace App\Livewire\CalendarEvents\Forms;

use App\Livewire\BaseForm;
use App\Livewire\CalendarEvents\Libraries\FullCalendarView;
use App\Models\CalendarEvent;
use Carbon\Carbon;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Route;

class CalendarEventForm extends BaseForm
{
    // public ?int $eventId = null;
    public ?string $startDate = null;
    public ?string $endDate = null;
    public ?CalendarEvent $calendarEvent;

    public function mount()
    {
        $this->calendarEvent ??= new CalendarEvent();
        // $this->calendarEvent = CalendarEvent::findOrNew($this->eventId);

        if ($this->startDate && $this->endDate) {
            $endDate = Carbon::parse($this->endDate)->subDay(1);
            $endDate->setTime(17, 0, 0);
            $this->endDate = $endDate;
        }

        if (!$this->calendarEvent->exists) {
            $this->data = [
                'title' => null,
                'start_time' => $this->startDate,
                'end_time' => $this->endDate,
            ];
            $this->form->fill($this->data);
        } else {
            $this->data = $this->calendarEvent->toArray();
            $this->form->fill($this->data);
        }
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')
                ->label('Tajuk')
                ->required(),
            DateTimePicker::make('start_time')
                ->label('Tarikh Dari')
                ->required()
                ->timezone('Asia/Kuala_Lumpur')
                ->native(false)
                ->weekStartsOnSunday()
                ->prefix('Mula'),
            DateTimePicker::make('end_time')
                ->label('Tarikh Hingga')
                ->required()
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

        // return to_route('calendar-event.index');
    }
}
