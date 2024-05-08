<?php

namespace App\Livewire\PIC\Tables;

use App\Livewire\BaseDataTable;
use App\Models\PIC;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
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
        $position = TextColumn::make('position.name')->label('Jawatan')->sortable()->searchable();

        return [
            $name,
            $position,
        ];
    }

    public function table(Table $table): Table
    {
        return $table->query($this->getQuery())
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah PIC Agensi')
                    ->icon('heroicon-s-plus')
                    // ->url(fn (): string => route('university.create'))
            ])
            ->columns($this->getColumns())
            ->emptyStateHeading('Tiada PIC Agensi')
            ->emptyStateDescription('Senarai PIC agensi akan dipaparkan di sini')
            ->actions([
                ActionGroup::make([
                    ViewAction::make()
                        ->icon(false)
                        ->label('Lihat'),
                    // ->url(fn (Project $record): string => route('university.show', $record)),
                    EditAction::make()
                        ->icon(false)
                        ->label('Kemaskini')
                        // ->url(fn (University $record): string => route('university.edit', $record)),
                    // DeleteAction::make(),
                ])->color('gray'),
            ])
            ->heading('Senarai PIC Agensi')
            ->description('Kemaskini maklumat PIC agensi di sini');
            // ->filters([
            //     SelectFilter::make('is_university')->label('Institusi')
            //         ->options([
            //             '0' => 'Sekolah',
            //             '1' => 'Universiti'
            //         ])
            //         ->native(false)
            // ]);
    }
}
