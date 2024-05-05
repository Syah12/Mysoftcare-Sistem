<?php

namespace App\Livewire\Dashboard\Partials;

use App\Models\Intern;
use Filament\Widgets\ChartWidget;

class InternChart extends ChartWidget
{
    protected static ?string $heading = 'Bilangan pelajar LI mengikut status';

    protected function getData(): array
    {
        $statuses = ['Aktif', 'Diterima', 'Ditolak', 'Tamat'];
        $data = [];

        foreach ($statuses as $status) {
            $count = Intern::where('status', $status)->count();

            $data[] = $count;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Status',
                    'data' => $data,
                    'backgroundColor' => [
                        '#36A2EB', // aktif
                        '#4BC0C0', // diterima
                        '#FFCE56', // ditolak
                        '#FF6384', // tamat 
                    ],
                ],
            ],
            'labels' => $statuses,
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
