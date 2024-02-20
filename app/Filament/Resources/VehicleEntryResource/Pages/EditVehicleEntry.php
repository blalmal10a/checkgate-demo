<?php

namespace App\Filament\Resources\VehicleEntryResource\Pages;

use App\Filament\Resources\VehicleEntryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVehicleEntry extends EditRecord
{
    protected static string $resource = VehicleEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
