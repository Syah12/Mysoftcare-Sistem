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
        $descriptionIcon = null;

        if ($presentCount >= $totalAttendance / 2) {
            $colour = 'success';
            $descriptionIcon = 'heroicon-m-arrow-trending-down';
        } else {
            $colour = 'danger';
            $descriptionIcon = 'heroicon-m-arrow-trending-up';
        }

        $intern = Stat::make('Bilangan Kehadiran Pelajar LI', $presentCount . '/' . $totalAttendance)
            ->description($totalAttendance - $presentCount . ' belum hadir')
            ->descriptionIcon($descriptionIcon)
            ->descriptionColor($colour)
            ->chart([$presentCount, $totalAttendance])
            ->color($colour);

        Stat::make('Bounce rate', '21%');

        return [
            $intern
        ];
    }
}
