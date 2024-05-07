<?php

namespace App\Livewire\Attendance\Tables;

use App\Livewire\BaseDataTable;
use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

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
        $date = TextInputColumn::make('date')->label('Tarikh Hari ini')->disabled();
        $attendance = ToggleColumn::make('is_present')->label('Kehadiran');

        return [
            $fullName,
            $phoneNumber,
            $date,
            $attendance
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
