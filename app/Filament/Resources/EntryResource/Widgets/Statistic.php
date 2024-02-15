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
    protected static ?string $pollingInterval = null;
    protected function getData(): array
    {

        return [];

        $commodities = Commodity::query();
        $dateRange = [
            date('Y-m-d'),
            date('Y-m-d 23:59:59')
        ];

        $commodities = $commodities
            ->select('id', 'name')
            ->whereHas('entries', fn ($entries) => $entries->whereBetween('created_at', $dateRange))
            ->get()->map(
                function ($item) {
                    $sum_weight = $item->entries()->sum('weight_in_quintal');
                    $vehicles = $item->entries()->count();
                    $item->sum_of_weights  = $sum_weight;
                    $sum_bags = $item->entries()->sum('no_of_bags');
                    $item->sum_of_bags = $sum_bags;
                    $label = $vehicles > 1 ? ' vehicles' : ' vehicle';
                    $item->name = $item->name . ' (' . $vehicles  . $label . ')';
                    return $item;
                }
            );

        $names = $commodities->pluck('name');
        $sum_of_weight = $commodities->pluck('sum_of_weights');
        $sum_of_bags = $commodities->pluck('sum_of_bags');
        $date = date('d/m/Y');

        return [
            'datasets' => [
                [
                    'label' => 'Sum of weights',
                    'data' => $sum_of_weight,
                    'borderColor' => '#9BD0F5',
                ],

                [
                    'label' => 'Total Bags',
                    'data' => $sum_of_bags,
                ],
            ],
            'labels' => $names,
            'title' => 'dfdf'
        ];
    }
    public function getDescription(): ?string
    {
        return  'Vairengte Supply Checkgate paltlanga Essential Commodities bungrua lo luh dan | ' . date('d/m/Y') . '.';
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
