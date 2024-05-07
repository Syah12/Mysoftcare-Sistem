<?php

namespace App\Livewire\ProjectManagement\Tables;

use App\Livewire\BaseDataTable;
use App\Models\Project;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Livewire\Component;

class ProjectManagementTable extends BaseDataTable
{
    public function getQuery()
    {
        return Project::query()->latest();
    }

    public function getColumns()
    {
        $year = TextColumn::make('year')->label('Tahun')->sortable();
        $name = TextColumn::make('name')->label('Nama Projek')->sortable()->searchable();
        $contractValue = TextColumn::make('contract_value')->label('Nilai Kontrak')->sortable();
        $status = TextColumn::make('status')->label('Status')->sortable()->badge()->color(fn (string $state): string => match ($state) {
            'Berjaya' => 'success',
            'Aktif' => 'primary',
            'EOT' => 'danger',
            'Tempoh jaminan' => 'warning',
            'Selesai' => 'gray',
        });

        return [
            $year,
            $name,
            $contractValue,
            $status
        ];
    }

    public function table(Table $table): Table
    {
        return $table->query($this->getQuery())
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Projek')
                    ->icon('heroicon-s-plus')
                    ->url(fn (): string => route('project.create'))
            ])
            ->columns($this->getColumns())
            ->emptyStateHeading('Tiada Projek')
            ->emptyStateDescription('Senarai projek akan dipaparkan di sini')
            ->actions([
                ViewAction::make()
                    ->label(false)
                    ->url(fn (Project $record): string => route('project.show', $record)),
                EditAction::make()
                    ->label(false)
                    ->color('warning')
                    ->url(fn (Project $record): string => route('project.edit', $record))
            ]);
    }
}
