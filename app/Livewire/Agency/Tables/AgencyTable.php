<?php

namespace App\Livewire\Agency\Tables;

use App\Livewire\BaseDataTable;
use App\Models\Agency;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Livewire\Component;

class AgencyTable extends BaseDataTable
{
    public function getQuery()
    {
        return Agency::query()->latest();
    }

    public function getColumns()
    {
        $name = TextColumn::make('name')->label('Nama')->sortable()->searchable();
        $phoneNumber = TextColumn::make('phone_number')->label('No. Telefon')->sortable()->searchable();
        $address = TextColumn::make('address')->label('Alamat')->sortable();
        $country = TextColumn::make('country')->label('Negara')->sortable();

        return [
            $name,
            $phoneNumber,
            $address,
            $country,
        ];
    }

    public function table(Table $table): Table
    {
        return $table->query($this->getQuery())
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Agensi')
                    ->icon('heroicon-s-plus')
                    ->url(fn (): string => route('agency.create'))
            ])
            ->columns($this->getColumns())
            ->emptyStateHeading('Tiada Agensi')
            ->emptyStateDescription('Senarai agensi akan dipaparkan di sini')
            ->actions([
                EditAction::make()
                    ->icon(false)
                    ->button()
                    ->label('Kemaskini')
                    ->url(fn (Agency $record): string => route('agency.edit', $record)),
                ActionGroup::make([
                    ViewAction::make()
                        ->icon(false)
                        ->label('Lihat')
                        ->url(fn (Agency $record): string => route('agency.show', $record)),
                    DeleteAction::make('delete')
                        ->label('Padam')
                        ->icon(false)
                        ->requiresConfirmation()
                        ->action(fn (Agency $record) => $record->delete())
                        ->modalHeading('Padam Agensi')
                        ->modalDescription('Adakah anda pasti ingin melakukan ini?')
                        ->modalCancelActionLabel('Tidak')
                        ->modalSubmitActionLabel('Ya')
                ])->color('gray'),
            ])
            ->heading('Senarai Agensi')
            ->description('Kemaskini maklumat agensi di sini');
    }
}
