<?php

namespace App\Livewire\CalendarEvents\Tables;

use App\Livewire\BaseDataTable;
use App\Models\CalendarEvent;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
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
                    // ->modalHeading('Maklumat Acara')
                    // ->modalDescription('Tambah Maklumat Acara')
                    // ->model(CalendarEvent::class)
                    // // ->slideOver()
                    // ->modalWidth('xl')
                    // ->color('info')
                    // ->createAnother(false)
                    // ->modalSubmitActionLabel('Simpan')
                    // ->modalCancelActionLabel('Batalkan')
                    // ->form($this->getFormFields())
                    ->dispatch('show', [null, null, null])
            ])
            ->columns($this->getColumns())
            ->emptyStateHeading('Tiada Acara')
            ->emptyStateDescription('Senarai acara akan dipaparkan di sini')
            ->actions([
                ViewAction::make()
                    ->icon(false)
                    ->modalHeading('Maklumat Acara')
                    ->modalDescription('Lihat Maklumat Acara')
                    ->button()
                    // ->slideOver()
                    ->modalWidth('xl')
                    ->color('gray')
                    ->label('Lihat')
                    ->modalCloseButton('Simpan')
                    ->form($this->getFormFields()),
                EditAction::make()
                    ->icon(false)
                    ->modalHeading('Maklumat Acara')
                    ->modalDescription('Kemaskini Maklumat Acara')
                    ->button()
                    ->label('Kemaskini')
                    // ->slideOver()
                    ->modalWidth('xl')
                    ->color('info')
                    ->modalSubmitActionLabel('Simpan')
                    ->modalCancelActionLabel('Batalkan')
                    ->form($this->getFormFields())
            ]);
    }
}
