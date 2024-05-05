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

        $totalProjectValueStat = Stat::make('Jumlah Nilai Kontrak', 'RM' . $totalProjectValue)
            ->description('Keseluruhan')
            ->descriptionColor('gray');
        $totalProjectValueSuccessStat = Stat::make('Jumlah Nilai Kontrak', 'RM' . $totalProjectValueSuccess)
            ->description('Berjaya')
            ->descriptionColor('success');
        $totalProjectValueCompleteStat = Stat::make('Jumlah Nilai Kontrak', 'RM' . $totalProjectValueComplete)
            ->description('Selesai')
            ->descriptionColor('primary');

        return [
            $totalProjectValueStat,
            $totalProjectValueSuccessStat,
            $totalProjectValueCompleteStat,
        ];
    }
}
