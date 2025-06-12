<?php

namespace App\Filament\Widgets;

use App\Models\Alumni;
use App\Models\Tracer;
use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;

class RespondenChart extends ChartWidget
{
    protected static ?string $heading = 'Perbandingan alumni';

    public static ?int $sort = 2;

    protected function getData(): array
    {
        $telah_mengisi = Tracer::count();
        $belum_mengisi = Alumni::count() - $telah_mengisi;
        return [
            'datasets' => [
                [
                    'label' => 'Jumlah',
                    'data' => [$telah_mengisi, $belum_mengisi],
                    'borderRadius' => 4,
                    'barPercentage' => 0.6,
                    'backgroundColor' => ['rgba(43, 218, 110, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                    'borderColor' => ['rgb(43, 218, 110)', 'rgb(255, 99, 132)'],
                ],
            ],
            'labels' => ['Telah mengisi', 'Belum mengisi'],
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
