<?php

namespace App\Livewire\Dashboard\Partials;

use App\Models\Project;
use Filament\Widgets\ChartWidget;

class ProjectChart extends ChartWidget
{
    protected static ?string $heading = 'Bilangan projek mengikut status';

    protected function getData(): array
    {
        $statuses = ['Berjaya', 'Aktif', 'EOT', 'Tempoh jaminan', 'Selesai'];
        $data = [];
        $label = [];

        foreach ($statuses as $status) {
            $count = Project::where('status', $status)->count();

            $data[] = $count;
        }

        foreach ($statuses as $status) {
            $label[] = $status;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Status',
                    'data' => $data,
                    'backgroundColor' => [
                        '#FF6384', // Berjaya
                        '#36A2EB', // Aktif
                        '#FFCE56', // EOT
                        '#4BC0C0', // Tempoh jaminan
                        '#BDABDA', // Selesai
                    ],
                    'borderColor' => [
                        '#FF6384', // Berjaya
                        '#36A2EB', // Aktif
                        '#FFCE56', // EOT
                        '#4BC0C0', // Tempoh jaminan
                        '#BDABDA', // Selesai
                    ],
                ],
            ],
            'labels' => $statuses,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
