<?php

namespace App\Livewire\Agency\Tables;

use App\Livewire\BaseDataTable;
use App\Models\Agency;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
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
                ActionGroup::make([
                    ViewAction::make()
                        ->icon(false)
                        ->label('Lihat'),
                    // ->url(fn (Project $record): string => route('university.show', $record)),
                    EditAction::make()
                        ->icon(false)
                        ->label('Kemaskini')
                        ->url(fn (Agency $record): string => route('agency.edit', $record)),
                    // DeleteAction::make(),
                ])->color('gray'),
            ])
            ->heading('Senarai Agensi')
            ->description('Kemaskini maklumat agensi di sini');
    }
}
