<?php

namespace App\Filament\Widgets;

use App\Models\Alumni;
use App\Models\Tracer;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    public static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Rata-rata IPK', round(Alumni::average('ipk'), 2) . '/4'),                
            Stat::make('Rata-rata waktu tunggu', round(Tracer::average('waktu_tunggu')) . ' bulan'),                
            Stat::make('Rata-rata pendapatan', 'Rp'. round(Tracer::average('pendapatan'))),                
        ];
    }
}
