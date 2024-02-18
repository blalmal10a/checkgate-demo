<?php

namespace App\Filament\Resources\VehicleEntryResource\Pages;

use App\Filament\Resources\VehicleEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewVehicleEntry extends ViewRecord
{
    protected static string $resource = VehicleEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
