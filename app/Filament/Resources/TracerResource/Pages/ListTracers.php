<?php

namespace App\Filament\Resources\TracerResource\Pages;

use App\Filament\Resources\TracerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTracers extends ListRecords
{
    protected static string $resource = TracerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
