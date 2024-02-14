<?php

namespace App\Filament\Resources\EntryResource\Widgets;

use App\Models\Commodity;
use App\Models\Entry;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class Statistic extends ChartWidget
{
    protected static ?string $heading = 'Chart';
    protected static ?string $maxHeight = '50vh';

    protected function getData(): array
    {
        $commodities = Commodity::query();
        $commodities = $commodities
            ->select('id', 'name')
            ->get()->map(
                function ($item) {
                    $sum = $item->entries()->sum('weight_in_quintal');
                    $item->sum_weight_today  = $sum;

                    return $item;
                }
            );

        $names = $commodities->pluck('name');
        $data = $commodities->pluck('sum_weight_today');


        $date = date('d/m-Y');
        return [
            'datasets' => [
                [
                    'label' => 'Sum of commodities weight on ' . $date,
                    'data' => $data,
                ],
            ],
            'labels' => $names
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
