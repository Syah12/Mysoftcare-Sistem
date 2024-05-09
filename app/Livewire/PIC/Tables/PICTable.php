<?php

namespace App\Livewire\PIC\Tables;

use App\Livewire\BaseDataTable;
use App\Models\Agency;
use App\Models\PIC;
use App\Models\Position;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Livewire\Component;

class PICTable extends BaseDataTable
{
    public function getQuery()
    {
        return PIC::query()->latest();
    }

    public function getColumns()
    {
        $name = TextColumn::make('name')->label('Nama')->sortable()->searchable();
        $agency = TextColumn::make('agency.name')->label('Agensi')->sortable()->searchable();
        $position = TextColumn::make('position.name')->label('Jawatan')->sortable()->searchable();
        $phoneNumber = TextColumn::make('phone_number')->label('No. Telefon')->sortable()->searchable();

        return [
            $name,
            $agency,
            $position,
            $phoneNumber
        ];
    }

    public function table(Table $table): Table
    {
        return $table->query($this->getQuery())
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah PIC Agensi')
                    ->icon('heroicon-s-plus')
                    ->url(fn (): string => route('pic.create'))
            ])
            ->columns($this->getColumns())
            ->emptyStateHeading('Tiada PIC Agensi')
            ->emptyStateDescription('Senarai PIC agensi akan dipaparkan di sini')
            ->actions([
                ActionGroup::make([
                    ViewAction::make()
                        ->icon(false)
                        ->label('Semak')
                        ->url(fn (PIC $record): string => route('pic.show', $record)),
                    EditAction::make()
                        ->icon(false)
                        ->label('Kemaskini')
                        ->url(fn (PIC $record): string => route('pic.edit', $record)),
                    DeleteAction::make('delete')
                        ->label('Padam')
                        ->icon(false)
                        ->requiresConfirmation()
                        ->action(fn (PIC $record) => $record->delete())
                        ->modalHeading('Padam PIC Agensi')
                        ->modalDescription('Adakah anda pasti ingin melakukan ini?')
                        ->modalCancelActionLabel('Tidak')
                        ->modalSubmitActionLabel('Ya')
                ])->color('gray'),
            ])
            ->heading('Senarai PIC Agensi')
            ->description('Kemaskini maklumat PIC agensi di sini')
            ->filters([
                SelectFilter::make('agency_id')->label('Agensi')
                    ->options(Agency::pluck('name', 'id'))
                    ->native(false),
                SelectFilter::make('position_id')->label('Jawatan')
                    ->options(Position::pluck('name', 'id'))
                    ->native(false)
            ]);
    }
}
