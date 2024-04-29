<?php

namespace App\Livewire\Employee\Tables;

use App\Livewire\BaseDataTable;
use App\Models\Employee;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EmployeeTable extends BaseDataTable
{
    public function getQuery()
    {
        return Employee::query()->latest();
    }

    public function getColumns()
    {
        $fullName = TextColumn::make('full_name')->label('Name Penuh')->searchable()->sortable();
        $birthDate = TextColumn::make('birth_date')->label('Tarikh Lahir')->sortable();
        $phoneNumber = TextColumn::make('phone_number')->label('No. Telefon')->sortable();
        $gender = TextColumn::make('gender')->label('Jantina')->sortable()->badge()->color(fn (string $state): string => match ($state) {
            'Lelaki' => 'info',
            'Perempuan' => 'danger',
        });
        $type = TextColumn::make('type')->label('Pekerja?')->sortable()->badge()->color(fn (string $state): string => match ($state) {
            'Staff' => 'success',
            'Intern' => 'warning',
        });
        $officePosition = TextColumn::make('office_position')->label('Pejabat');

        return [
            $fullName,
            $birthDate,
            $phoneNumber,
            $gender,
            $type,
            $officePosition
        ];
    }

    public function getFormFields()
    {
        $fullName = TextInput::make('full_name')->label('Nama Penuh')->required();
        $birthDate = DatePicker::make('birth_date')->label('Tarikh Lahir')->required();
        $phoneNumber = TextInput::make('phone_number')->label('No. Telefon')->required();
        $gender = Radio::make('gender')->label('Jantina')->required()
            ->options([
                'Lelaki' => 'Lelaki',
                'Perempuan' => 'Perempuan'
            ]);
        $type = ToggleButtons::make('type')->label('Pekerja?')->helperText("Staff tetap?")->inline()->required()
            ->options([
                'Staff'    => 'Ya',
                'Intern'   => 'Tidak',
            ])
            ->colors([
                'Staff' => 'info',
                'Intern' => 'info',
            ])
            ->live()
            ->afterStateUpdated(function (Get $get, Set $set) {
                if ($get('type') == 'Staff') {
                    $set('university', null);
                    $set('education', null);
                }
            });
        $university = Select::make('university')->label('Universiti')->required(fn (Get $get) => $get('type'))
            ->options([
                'UiTM' => 'UiTM',
                'UniSZA' => 'UniSZA',
                'UMT' => 'UMT',
            ])
            ->hidden(fn (Get $get) => $get('type') != 'Intern')
            ->searchable();
        $education = Radio::make('education')->label('Pengajian')->required()
            ->options([
                'Diploma' => 'Diploma',
                'Degree' => 'Degree'
            ])
            ->required(fn (Get $get) => $get('type'))
            ->hidden(fn (Get $get) => $get('type') != 'Intern');
        $officePosition = TextInput::make('office_position');
        $colour = ColorPicker::make('colour');

        return [
            $fullName,
            $birthDate,
            $phoneNumber,
            $gender,
            $type,
            $university,
            $education,
            $officePosition,
            $colour
        ];

        Notification::make()
            ->title('Berjaya')
            ->body('Maklumat berjaya disimpan')
            ->success()
            ->color('success')
            ->seconds(3)
            ->send();
    }

    public function table(Table $table): Table
    {
        return $table->query($this->getQuery())
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Pekerja')
                    ->icon('heroicon-s-plus')
                    ->modalHeading('Maklumat Pekerja')
                    ->modalDescription('Tambah Maklumat Pekerja')
                    ->model(Employee::class)
                    ->slideOver()
                    ->modalWidth('xl')
                    ->color('info')
                    ->createAnother(false)
                    ->modalSubmitActionLabel('Simpan')
                    ->modalCancelActionLabel('Batalkan')
                    ->form($this->getFormFields())
            ])
            ->columns($this->getColumns())
            ->actions([
                ViewAction::make()
                    ->icon(false)
                    ->modalHeading('Maklumat Pekerja')
                    ->modalDescription('Lihat Maklumat Pekerja')
                    ->button()
                    ->slideOver()
                    ->modalWidth('xl')
                    ->color('gray')
                    ->label('Lihat')
                    ->modalCloseButton('Simpan')
                    ->form($this->getFormFields()),
                EditAction::make()
                    ->icon(false)
                    ->modalHeading('Maklumat Pekerja')
                    ->modalDescription('Kemaskini Maklumat Pekerja')
                    ->button()
                    ->label('Kemaskini')
                    ->slideOver()
                    ->modalWidth('xl')
                    ->color('info')
                    ->modalSubmitActionLabel('Simpan')
                    ->modalCancelActionLabel('Batalkan')
                    ->form($this->getFormFields())
            ]);
    }
}
