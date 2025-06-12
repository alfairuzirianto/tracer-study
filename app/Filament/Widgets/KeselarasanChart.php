<?php

namespace App\Filament\Widgets;

use App\Models\Tracer;
use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;

class KeselarasanChart extends ChartWidget
{
    protected static ?string $heading = 'Keselarasan';

    public static ?int $sort = 3;

    protected function getData(): array
    {
        $sangat_erat = Tracer::where('keselarasan', 'Sangat Erat')->count();
        $erat = Tracer::where('keselarasan', 'Erat')->count();
        $cukup_erat = Tracer::where('keselarasan', 'Cukup Erat')->count();
        $kurang_erat = Tracer::where('keselarasan', 'Kurang Erat')->count();
        $tidak_erat = Tracer::where('keselarasan', 'Tidak Erat')->count();
        return [
            'datasets' => [
                [
                    'label' => 'Jumlah',
                    'data' => [
                        $sangat_erat,
                        $erat,
                        $cukup_erat,
                        $kurang_erat,
                        $tidak_erat,
                    ],
                    'borderRadius' => 4,
                    'barPercentage' => 0.6,
                    'backgroundColor' => [
                        'rgba(43, 218, 110, 0.2)', 
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    'borderColor' => [
                        'rgb(43, 218, 110)', 
                        'rgb(255, 99, 132)',
                        'rgb(255, 206, 86)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                    ],
                ],
            ],
            'labels' => [
                'Sangat Erat',
                'Erat',
                'Cukup Erat',
                'Kurang Erat',
                'Tidak Erat',
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array|RawJs|null
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
            ],
        ];
    }
}
