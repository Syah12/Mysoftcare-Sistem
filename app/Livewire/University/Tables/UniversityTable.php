<?php

namespace App\Livewire\University\Tables;

use App\Livewire\BaseDataTable;
use App\Models\University;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Livewire\Component;

class UniversityTable extends BaseDataTable
{
    public function getQuery()
    {
        return University::query()->latest();
    }

    public function getColumns()
    {
        $name = TextColumn::make('name')->label('Nama')->sortable()->searchable();
        $phoneNumber = TextColumn::make('phone_number')->label('No. Telefon')->sortable()->searchable();
        $address = TextColumn::make('address')->label('Alamat')->sortable();
        $country = TextColumn::make('country')->label('Negara')->sortable();
        $institution = IconColumn::make('is_university')->label('Universiti?')->boolean()->sortable();

        return [
            $name,
            $phoneNumber,
            $address,
            $country,
            $institution
        ];
    }

    public function table(Table $table): Table
    {
        return $table->query($this->getQuery())
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Institusi')
                    ->icon('heroicon-s-plus')
                    ->url(fn (): string => route('university.create'))
            ])
            ->columns($this->getColumns())
            ->emptyStateHeading('Tiada Institusi')
            ->emptyStateDescription('Senarai institusi akan dipaparkan di sini')
            ->actions([
                ActionGroup::make([
                    ViewAction::make()
                        ->icon(false)
                        ->label('Semak')
                        ->url(fn (University $record): string => route('university.show', $record)),
                    EditAction::make()
                        ->icon(false)
                        ->label('Kemaskini')
                        ->url(fn (University $record): string => route('university.edit', $record)),
                    DeleteAction::make('delete')
                        ->label('Padam')
                        ->icon(false)
                        ->requiresConfirmation()
                        ->action(fn (University $record) => $record->delete())
                        ->modalHeading('Padam Institusi')
                        ->modalDescription('Adakah anda pasti ingin melakukan ini?')
                        ->modalCancelActionLabel('Tidak')
                        ->modalSubmitActionLabel('Ya')
                ])->color('gray'),
            ])
            ->heading('Senarai Institusi')
            ->description('Kemaskini maklumat institusi di sini')
            ->filters([
                SelectFilter::make('is_university')->label('Institusi')
                    ->options([
                        '0' => 'Sekolah',
                        '1' => 'Universiti'
                    ])
                    ->native(false)
            ]);
    }
}
