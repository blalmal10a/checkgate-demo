<?php

namespace App\Filament\Resources\VehicleCheckResource\Pages;

use App\Filament\Resources\VehicleCheckResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Http\Request;

class CreateVehicleCheck extends CreateRecord
{
    protected static string $resource = VehicleCheckResource::class;

    // public function afterCreate()
    // {
    //     logger('after create');
    //     return redirect()->route('filament.admin.resources.vehicle-checks.index');
    // }

    protected function getRedirectUrl(): string
    {
        return route('filament.admin.resources.vehicle-checks.index');
    }
}
