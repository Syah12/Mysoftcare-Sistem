<?php

namespace App\Livewire\Attendance\Tables;

use App\Livewire\BaseDataTable;
use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use Filament\Forms\Components\Livewire;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;

class AttendanceTable extends BaseDataTable
{
    public function getQuery()
    {
        return Attendance::query()->whereDate('date', Carbon::now());
    }

    public function getColumns()
    {
        $fullName = TextColumn::make('employee.name')->label('Name Penuh')->searchable()->sortable();
        $phoneNumber = TextColumn::make('employee.phone_number')->label('No. Telefon')->sortable();
        $date = TextColumn::make('date')->label('Tarikh Hari ini');
        $attendance = ToggleColumn::make('is_present')->label('Kehadiran');
        $excuse = TextInputColumn::make('excuse')->label('Sebab')->disabled(fn ($record) => $record->is_present);
        return [
            $fullName,
            $phoneNumber,
            $date,
            $attendance,
            $excuse
        ];
    }

    public function table(Table $table): Table
    {
        return $table->query($this->getQuery())
            ->columns($this->getColumns())
            ->emptyStateHeading('Tiada Kehadiran')
            ->emptyStateDescription('Senarai kehadiran akan dipaparkan di sini');
    }
}
