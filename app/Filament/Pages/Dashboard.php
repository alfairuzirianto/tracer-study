<?php

namespace App\Filament\Pages;

class Dashboard extends \Filament\Pages\Dashboard
{
    protected static string $routePath = '/dashboard';

    protected static null|string $activeNavigationIcon = 'heroicon-s-home';

    public function getColumns(): int | string | array
    {
        return [
            'sm' => 1,
            'md' => 3,
        ];
    }
}