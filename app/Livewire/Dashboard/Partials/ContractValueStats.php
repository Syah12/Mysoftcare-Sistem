<?php

namespace App\Livewire\Dashboard\Partials;

use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ContractValueStats extends BaseWidget
{
    protected function getStats(): array
    {
        $totalProjectValue = Project::sum('contract_value');
        $totalProjectValueSuccess = Project::where('status', 'Berjaya')->sum('contract_value');
        $totalProjectValueComplete = Project::where('status', 'Selesai')->sum('contract_value');
        $totalProjectValueEOT = Project::where('status', 'EOT')->sum('contract_value');
        $totalProjectValueContractPeriod = Project::where('status', 'Tempoh jaminan')->sum('contract_value');
        $totalProjectValueActive = Project::where('status', 'Aktif')->sum('contract_value');

        $totalProjectValueStat = Stat::make('Jumlah Nilai Kontrak', 'RM' . $totalProjectValue)
            ->description('Keseluruhan')
            ->descriptionColor('warning')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([$totalProjectValueSuccess, $totalProjectValueActive, $totalProjectValueEOT, $totalProjectValueContractPeriod, $totalProjectValueComplete, $totalProjectValue])
            ->color('warning');
        $totalProjectValueSuccessStat = Stat::make('Jumlah Nilai Kontrak', 'RM' . $totalProjectValueSuccess)
            ->description('Berjaya')
            ->descriptionColor('success')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([$totalProjectValueSuccess, $totalProjectValue])
            ->color('success');
        $totalProjectValueCompleteStat = Stat::make('Jumlah Nilai Kontrak', 'RM' . $totalProjectValueComplete)
            ->description('Selesai')
            ->descriptionColor('primary')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([$totalProjectValueComplete, $totalProjectValue])
            ->color('primary');

        return [
            $totalProjectValueStat,
            $totalProjectValueSuccessStat,
            $totalProjectValueCompleteStat,
        ];
    }
}
