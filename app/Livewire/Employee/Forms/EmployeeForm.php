<?php

namespace App\Livewire\Employee\Forms;

use App\Livewire\BaseForm;
use App\Models\Employee;
use App\Models\Position;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Livewire\Component;

class EmployeeForm extends BaseForm
{
    public ?Employee $employee = null;

    public function mount()
    {
        $this->employee ??= new Employee();
        $this->data = $this->employee->toArray();
        $this->form->fill($this->data);
    }

    public function form(Form $form): Form
    {
        $employeeData =  Section::make('Staf')
            ->description('Maklumat mengenai staf')
            ->schema([
                TextInput::make('name')->label('Nama Penuh')->required(),
                DatePicker::make('birth_date')->label('Tarikh Lahir')->required(),
                Select::make('gender')
                    ->label('Jantina')
                    ->options([
                        'Lelaki' => 'Lelaki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->native(false)
                    ->required(),
                TextInput::make('phone_number')->label('No. Telefon')->required(),
                TextInput::make('email')->label('E-mel')->required(),
                FileUpload::make('image')->label('Gambar Profil')->helperText('Format PNG')->disk('public')->directory('file'),
                Select::make('position_id')->label('Jawatan')->helperText('Jawatan dalam pejabat')
                    ->options(Position::pluck('name', 'id'))
                    ->searchable()
                    ->native(false)
                    ->required(),
                Select::make('office_position')
                    ->label('Posisi Pejabat')
                    ->options([
                        'Atas' => 'Atas',
                        'Bawah' => 'Bawah',
                    ])
                    ->helperText('Kedudukan staf tersebut dalam pejabat')
                    ->native(false)
                    ->required()
            ]);

        return $form->schema([
            $employeeData,
        ])->statePath('data')->inlineLabel();
    }

    public function save()
    {
        $this->form->getState();
        $this->employee->fill([
            ...$this->data,
        ])->save();

        Notification::make()
            ->title('Berjaya')
            ->body('Maklumat berjaya disimpan')
            ->success()
            ->color('success')
            ->seconds(3)
            ->send();

        return to_route('employee.index');
    }
}
