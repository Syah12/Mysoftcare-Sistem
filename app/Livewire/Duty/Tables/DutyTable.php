<?php

namespace App\Livewire\Duty\Tables;

use App\Livewire\BaseDataTable;
use App\Models\Duty;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DutyTable extends BaseDataTable
{
    public function getQuery()
    {
        return Duty::query()->latest();
    }

    public function getColumns()
    {
        $name = TextColumn::make('name')->label('Tugas')->sortable();
        $gender = TextColumn::make('gender')->label('Tugas Untuk?')->sortable()->color(fn (string $state): string => match ($state) {
            'Lelaki' => 'info',
            'Perempuan' => 'danger',
            'Lelaki & Perempuan' => 'warning'
        });
        $officePosition = TextColumn::make('office_position')->label('Posisi Pejabat')->sortable()->badge()->color(fn (string $state): string => match ($state) {
            'Atas' => 'info',
            'Bawah' => 'danger',
        });

        return [
            $name,
            $gender,
            $officePosition,
        ];
    }

    public function getFormFields()
    {
        $name = TextInput::make('name')->label('Tugas')->required();
        $gender = Radio::make('gender')->label('Tugas Untuk?')->helperText('Tugas tersebut sesuai untuk lelaki atau perempuan atau kedua-duanya?')->required()
            ->options([
                'Lelaki' => 'Lelaki',
                'Perempuan' => 'Perempuan',
                'Lelaki & Perempuan' => 'Lelaki & Perempuan'
            ]);
        $officePosition = Radio::make('office_position')->label('Posisi Pejabat')->helperText('Tugas tersebut di posisi pejabat atas atau bawah?')->required()
            ->options([
                'Atas' => 'Atas',
                'Bawah' => 'Bawah'
            ]);

        return [
            $name,
            $gender,
            $officePosition,
        ];
    }

    public function table(Table $table): Table
    {
        return $table->query($this->getQuery())
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Tugas')
                    ->icon('heroicon-s-plus')
                    ->modalHeading('Maklumat Tugas')
                    ->modalDescription('Tambah Maklumat Tugas')
                    ->model(Duty::class)
                    // ->slideOver()
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
                    ->modalHeading('Maklumat Tugas')
                    ->modalDescription('Lihat Maklumat Tugas')
                    ->button()
                    // ->slideOver()
                    ->modalWidth('xl')
                    ->color('gray')
                    ->label('Lihat')
                    ->modalCloseButton('Simpan')
                    ->form($this->getFormFields()),
                EditAction::make()
                    ->icon(false)
                    ->modalHeading('Maklumat Tugas')
                    ->modalDescription('Kemaskini Maklumat Tugas')
                    ->button()
                    ->label('Kemaskini')
                    // ->slideOver()
                    ->modalWidth('xl')
                    ->color('info')
                    ->modalSubmitActionLabel('Simpan')
                    ->modalCancelActionLabel('Batalkan')
                    ->form($this->getFormFields())
            ]);
    }
}
