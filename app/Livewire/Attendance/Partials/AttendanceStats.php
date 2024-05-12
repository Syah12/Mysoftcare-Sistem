<?php

namespace App\Livewire\Attendance\Partials;

use App\Models\Attendance;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AttendanceStats extends BaseWidget
{
    protected function getStats(): array
    {
        $totalAttendance = Attendance::count();
        $presentCount = Attendance::where('is_present', true)->count();

        $intern = Stat::make('Bilangan Kehadiran Pelajar LI', $presentCount . '/' . $totalAttendance);
        // $staf = Stat::make('Bilangan Kehadiran Staf', $presentCount . '/' . $totalAttendance);

        return [
            $intern,
            // $staf
        ];
    }
}
