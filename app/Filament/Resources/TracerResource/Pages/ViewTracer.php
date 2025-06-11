<?php

namespace App\Filament\Resources\TracerResource\Pages;

use App\Filament\Resources\TracerResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTracer extends ViewRecord
{
    protected static string $resource = TracerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
