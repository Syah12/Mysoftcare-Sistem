<?php

namespace App\Livewire\ProjectManagement\Tables;

use App\Livewire\BaseDataTable;
use App\Models\Project;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
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
        $name = TextColumn::make('name')->label('Nama Projek')->sortable()->searchable();
        $agency = TextColumn::make('agency.name')->label('Agensi')->sortable();
        $startDateContract = TextColumn::make('start_date_contract')->label('Tarikh Mula Kontrak')->sortable()->dateTime('d/m/Y');
        $endDateContract = TextColumn::make('end_date_contract')->label('Tarikh Akhir Kontrak')->sortable()->dateTime('d/m/Y');
        $status = TextColumn::make('status')->label('Status')->sortable()->badge()->color(fn (string $state): string => match ($state) {
            'Berjaya' => 'success',
            'Aktif' => 'primary',
            'EOT' => 'danger',
            'Tempoh jaminan' => 'warning',
            'Selesai' => 'gray',
        });
        $mileage = TextColumn::make('mileage')->label('Perbatuan')
            // ->getStateUsing(fn ($record) => !is_null($record->mileage) ? 'Ada' : 'Tiada');
            ->getStateUsing(fn ($record) => !is_null($record->mileage))
            ->formatStateUsing(
                fn (bool $state) => $state
                    ? '<span style="color: green;">&#10003;</span>'
                    : '<span style="color: red;">&#10007;</span>'
            )->html();

        return [
            $name,
            $agency,
            $startDateContract,
            $endDateContract,
            $status,
            $mileage
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
            // ->bulkActions([
            //     BulkAction::make('delete')
            //         ->requiresConfirmation()
            //         ->color('danger')
            //         ->label('Padam')
            //         ->modalHeading('Padam Semua')
            //         ->modalDescription('Adakah anda pasti ingin melakukan ini?')
            //         ->modalCancelActionLabel('Tidak')
            //         ->modalSubmitActionLabel('Ya')
            //         ->action(function ($records) {
            //             foreach ($records as $record) {
            //                 $record->delete();
            //             }
            //         })
            // ])
            ->actions([
                EditAction::make()
                    ->label('Kemaskini')
                    ->button()
                    ->icon(false)
                    ->url(fn (Project $record): string => route('project.edit', $record)),
                ActionGroup::make([
                    ViewAction::make()
                        ->label('Lihat')
                        ->icon(false)
                        ->url(fn (Project $record): string => route('project.show', $record)),
                    DeleteAction::make('delete')
                        ->label('Padam')
                        ->icon(false)
                        ->requiresConfirmation()
                        ->action(fn (Project $record) => $record->delete())
                        ->modalHeading('Padam Projek')
                        ->modalDescription('Adakah anda pasti ingin melakukan ini?')
                        ->modalCancelActionLabel('Tidak')
                        ->modalSubmitActionLabel('Ya')
                ])->color('gray'),
            ])
            ->heading('Senarai Projek')
            ->description('Kemaskini maklumat projek di sini')
            ->filters([
                SelectFilter::make('status')->label('Status')
                    ->options([
                        'Tempoh Jaminan' => 'Tempoh Jaminan',
                        'EOT' => 'EOT',
                        'Berjaya' => 'Berjaya',
                        'Aktif' => 'Aktif',
                        'Selesai' => 'Selesai'
                    ])
                    ->native(false)
            ]);
    }
}
