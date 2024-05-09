<?php

namespace App\Livewire\CalendarEvents\Tables;

use App\Livewire\BaseDataTable;
use App\Models\CalendarEvent;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CalendarEventTable extends BaseDataTable
{
    public function getQuery()
    {
        return CalendarEvent::query()->latest();
    }

    public function getColumns()
    {
        $title = TextColumn::make('title')->label('Tajuk')->sortable();
        $startTime = TextColumn::make('start_time')->label('Tarikh Dari')->sortable();
        $endTime = TextColumn::make('end_time')->label('Tarikh Hingga')->sortable();

        return [
            $title,
            $startTime,
            $endTime,
        ];
    }

    public function getFormFields()
    {
        $title = TextInput::make('title')->label('Tajuk')->required();
        $startTime = DateTimePicker::make('start_time')->label('Tarikh Dari')->required();
        $endTime = DateTimePicker::make('end_time')->label('Tarikh Hingga')->required();

        return [
            $title,
            $startTime,
            $endTime,
        ];
    }

    public function table(Table $table): Table
    {
        return $table->query($this->getQuery())
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Acara')
                    ->icon('heroicon-s-plus')
                    ->dispatch('show', [null, null, null])
            ])
            ->columns($this->getColumns())
            ->emptyStateHeading('Tiada Acara')
            ->emptyStateDescription('Senarai acara akan dipaparkan di sini')
            ->actions([
                ActionGroup::make([
                    EditAction::make()
                        ->icon(false)
                        ->label('Kemaskini')
                        ->dispatch('show', [null, null, null]),
                    DeleteAction::make('delete')
                        ->label('Padam')
                        ->icon(false)
                        ->requiresConfirmation()
                        ->action(fn (CalendarEvent $record) => $record->delete())
                        ->modalHeading('Padam Acara')
                        ->modalDescription('Adakah anda pasti ingin melakukan ini?')
                        ->modalCancelActionLabel('Tidak')
                        ->modalSubmitActionLabel('Ya')
                ])->color('gray'),
            ]);
    }
}
