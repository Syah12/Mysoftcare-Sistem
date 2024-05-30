<?php

namespace App\Livewire\Dashboard\Tables;

use App\Livewire\BaseDataTable;
use App\Models\Project;
use Carbon\Carbon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Livewire\Component;

class ProjectActiveTable extends BaseDataTable
{
    public function getQuery()
    {
        return Project::query()->where('status', 'Aktif')->latest();
    }

    public function getColumns()
    {
        $title = TextColumn::make('name')->label('Tajuk')->sortable()->searchable();
        $startTime = TextColumn::make('start_date_contract')->label('Tarikh Mula Kontrak')->sortable();
        $endTime = TextColumn::make('end_date_contract')->label('Tarikh Akhir Kontrak')->sortable();
        $duration = TextColumn::make('duration')
            ->label('Tempoh Kontrak (Bulan & Hari)')
            ->getStateUsing(function ($record) {
                $startDate = Carbon::parse($record->start_date_contract);
                $endDate = Carbon::parse($record->end_date_contract);
                $interval = $startDate->diff($endDate);
                $months = $interval->m + ($interval->y * 12);
                $days = $interval->d;

                if ($months > 0 && $days > 0) {
                    return "{$months} bulan dan {$days} hari";
                } elseif ($months > 0) {
                    return "{$months} bulan";
                } elseif ($days > 0) {
                    return "{$days} hari";
                } else {
                    return '0 hari';
                }
            });
        $status = TextColumn::make('status')->label('Status')->sortable()->badge()->color(fn (string $state): string => match ($state) {
            'Aktif' => 'primary',
        });

        return [
            $title,
            $startTime,
            $endTime,
            $duration,
            $status
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
