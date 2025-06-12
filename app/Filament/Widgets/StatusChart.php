<?php

namespace App\Filament\Widgets;

use App\Models\Tracer;
use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;

class StatusChart extends ChartWidget
{
    protected static ?string $heading = 'Status alumni';

    public static ?int $sort = 4;

    protected function getData(): array
    {
        $bekerja = Tracer::where('status', 'Bekerja')->count();
        $lanjut_studi = Tracer::where('status', 'Lanjut Studi')->count();
        $wiraswasta = Tracer::where('status', 'Wiraswasta')->count();
        $belum_bekerja = Tracer::where('status', 'Belum Bekerja')->count();
        $lainnya = Tracer::where('status', 'Lainnya')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah',
                    'data' => [$bekerja, $lanjut_studi, $wiraswasta, $belum_bekerja, $lainnya],
                    'backgroundColor' => [
                        'rgba(30, 173, 2, 0.2)',
                        'rgba(0, 27, 177, 0.2)',
                        'rgba(177, 1, 153, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    'hoverBackgroundColor' => [
                        'rgb(30, 173, 2)',
                        'rgb(0, 27, 177)',
                        'rgb(177, 1, 153)',
                        'rgb(255, 206, 86)',
                        'rgb(255, 99, 132)',
                    ],
                    'borderColor' => [
                        'rgb(30, 173, 2)',
                        'rgb(0, 27, 177)',
                        'rgb(177, 1, 153)',
                        'rgb(255, 206, 86)',
                        'rgb(255, 99, 132)',
                    ],
                    'borderAlign' => 'inner',
                    'hoverOffset' => 15,
                ],
            ],
            'labels' => [
                'Bekerja',
                'Lanjut Studi',
                'Wiraswasta',
                'Belum Bekerja',
                'Lainnya',
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    protected function getOptions(): array|RawJs|null
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => 'true',
                    'position' => 'right',
                ],
            ],
            'scales' => [
                'y' => [
                    'display' => false,
                ],
                'x' => [
                    'display' => false,
                ],
            ],
            'layout' => [
                'padding' => 10,
            ],
        ];
    }
}
