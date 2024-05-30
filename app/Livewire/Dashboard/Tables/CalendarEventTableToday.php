<?php

namespace App\Livewire\Dashboard\Tables;

use App\Livewire\BaseDataTable;
use App\Models\CalendarEvent;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Livewire\Component;

class CalendarEventTableToday extends BaseDataTable
{
    public function getQuery()
    {
        return CalendarEvent::query()->whereDate('start_time', now()->toDateString())->latest();
    }

    public function getColumns()
    {
        $title = TextColumn::make('title')->label('Acara')->sortable()->searchable();
        $startTime = TextColumn::make('start_time')->label('Tarikh Dari')->sortable();
        $endTime = TextColumn::make('end_time')->label('Tarikh Hingga')->sortable();

        return [
            $title,
            $startTime,
            $endTime,
        ];
    }

    public function table(Table $table): Table
    {
        return $table->query($this->getQuery())
            ->columns($this->getColumns())
            ->emptyStateHeading('Tiada Acara')
            ->emptyStateDescription('Senarai acara akan dipaparkan di sini');
    }
}
