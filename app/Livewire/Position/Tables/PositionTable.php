<?php

namespace App\Livewire\Position\Tables;

use App\Livewire\BaseDataTable;
use App\Models\Position;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Livewire\Component;

class PositionTable extends BaseDataTable
{
    public function getQuery()
    {
        return Position::query()->latest();
    }

    public function getColumns()
    {
        $name = TextColumn::make('name')->label('Jawatan')->sortable()->searchable();
        $createdAt = TextColumn::make('created_at')->label('Dicipta pada')->sortable();
        $updatedAt = TextColumn::make('updated_at')->label('Dikemaskini pada')->sortable();

        return [
            $name,
            $createdAt,
            $updatedAt
        ];
    }

    public function table(Table $table): Table
    {
        return $table->query($this->getQuery())
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Jawatan')
                    ->icon('heroicon-s-plus')
                    ->url(fn (): string => route('position.create'))
            ])
            ->columns($this->getColumns())
            ->emptyStateHeading('Tiada Jawatan')
            ->emptyStateDescription('Senarai jawatan akan dipaparkan di sini')
            ->actions([
                ActionGroup::make([
                    ViewAction::make()
                        ->icon(false)
                        ->label('Lihat'),
                    // ->url(fn (Project $record): string => route('university.show', $record)),
                    EditAction::make()
                        ->icon(false)
                        ->label('Kemaskini')
                        ->url(fn (Position $record): string => route('position.edit', $record)),
                    // DeleteAction::make(),
                ])->color('gray'),
            ])
            ->heading('Senarai Jawatan')
            ->description('Kemaskini maklumat jawatan di sini');
    }
}
