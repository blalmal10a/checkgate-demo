<?php

namespace App\Filament\Pages;

use App\Filament\Resources\EntryResource\Widgets\Statistic;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    public function getColumns(): int | string | array
    {
        return  1; // Set the number of columns to  12
    }

    public function widgets(): array
    {
        return [
            Statistic::class,
            // Additional widgets...
        ];
    }
}
