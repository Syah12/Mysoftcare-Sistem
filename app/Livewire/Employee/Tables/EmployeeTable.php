<?php

namespace App\Livewire\Employee\Tables;

use App\Livewire\BaseDataTable;
use App\Models\Employee;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class EmployeeTable extends BaseDataTable
{
    public function getQuery()
    {
        return Employee::query()->latest();
    }

    public function getColumns()
    {
        $img = ImageColumn::make('image')->label('Gambar Profil')->circular()->width(60)->height(60);
        $name = TextColumn::make('name')->label('Name Penuh')->searchable()->sortable();
        $email = TextColumn::make('email')->label('E-mel')->sortable();
        $phoneNumber = TextColumn::make('phone_number')->label('No. Telefon')->sortable();

        return [
            $img,
            $name,
            $email,
            $phoneNumber
        ];
    }

    public function table(Table $table): Table
    {
        return $table->query($this->getQuery())
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Staf')
                    ->icon('heroicon-s-plus')
                    ->url(fn (): string => route('employee.create'))
            ])
            ->columns($this->getColumns())
            ->emptyStateHeading('Tiada Staf')
            ->emptyStateDescription('Senarai pekerja akan dipaparkan di sini')
            ->actions([
                ActionGroup::make([
                    ViewAction::make()
                        ->icon(false)
                        ->label('Semak')
                        ->url(fn (Employee $record): string => route('employee.show', $record)),
                    EditAction::make()
                        ->icon(false)
                        ->label('Kemaskini')
                        ->url(fn (Employee $record): string => route('employee.edit', $record)),
                    DeleteAction::make('delete')
                        ->label('Padam')
                        ->icon(false)
                        ->requiresConfirmation()
                        ->action(fn (Employee $record) => $record->delete())
                        ->modalHeading('Padam Staf')
                        ->modalDescription('Adakah anda pasti ingin melakukan ini?')
                        ->modalCancelActionLabel('Tidak')
                        ->modalSubmitActionLabel('Ya')
                ])->color('gray'),
            ])
            ->heading('Senarai Staf')
            ->description('Kemaskini maklumat staf di sini')
            ->filters([
                SelectFilter::make('gender')->label('Jantina')
                    ->options([
                        'Lelaki' => 'Lelaki',
                        'Perempuan' => 'Perempuan'
                    ])
                    ->native(false)
            ]);
    }
}
