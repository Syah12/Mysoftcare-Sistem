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
        $officePosition = TextColumn::make('office_position')->label('Pejabat')->sortable()->badge()->color(fn (string $state): string => match ($state) {
            'Bawah' => 'gray',
            'Atas' => 'gray',
        });

        return [
            $fullName,
            $birthDate,
            $phoneNumber,
            $officePosition
        ];
    }

    public function getFormFields()
    {
        $fullName = TextInput::make('full_name')->label('Nama Penuh')->required();
        $birthDate = DatePicker::make('birth_date')->label('Tarikh Lahir')->required();
        $phoneNumber = TextInput::make('phone_number')->label('No. Telefon')->required();
        $officePosition = Select::make('office_position')->label('Posisi Pejabat')->helperText('Kedudukan staf dalam pejabat sama ada atas atau bawah')
            ->options([
                'Atas' => 'Atas',
                'Bawah' => 'Bawah',
            ])
            ->native(false);
        // $colour = ColorPicker::make('colour');

        return [
            $fullName,
            $birthDate,
            $phoneNumber,
            $officePosition,
            // $colour
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
                    ->label('Tambah Staf')
                    ->icon('heroicon-s-plus')
                    ->modalHeading('Maklumat Staf')
                    ->modalDescription('Tambah Maklumat Staf')
                    ->model(Employee::class)
                    // ->slideOver()
                    // ->modalWidth('xl')
                    ->color('info')
                    ->createAnother(false)
                    ->modalSubmitActionLabel('Simpan')
                    ->modalCancelActionLabel('Batalkan')
                    ->form($this->getFormFields())
            ])
            ->columns($this->getColumns())
            ->emptyStateHeading('Tiada Staf')
            ->emptyStateDescription('Senarai pekerja akan dipaparkan di sini')
            ->actions([
                ViewAction::make()
                    ->icon(false)
                    ->modalHeading('Maklumat Staf')
                    ->modalDescription('Lihat Maklumat Staf')
                    ->button()
                    // ->slideOver()
                    // ->modalWidth('xl')
                    ->color('gray')
                    ->label('Lihat')
                    ->modalCloseButton('Simpan')
                    ->form($this->getFormFields()),
                EditAction::make()
                    ->icon(false)
                    ->modalHeading('Maklumat Staf')
                    ->modalDescription('Kemaskini Maklumat Staf')
                    ->button()
                    ->label('Kemaskini')
                    // ->slideOver()
                    // ->modalWidth('xl')
                    ->color('info')
                    ->modalSubmitActionLabel('Simpan')
                    ->modalCancelActionLabel('Batalkan')
                    ->form($this->getFormFields())
            ]);
    }
}
