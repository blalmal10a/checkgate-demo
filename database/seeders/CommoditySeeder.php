<?php

namespace Database\Seeders;

use App\Models\Commodity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommoditySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public $commodityNames = [
        'Bazar Rice',
        'Alu',
        'Purun',
        'Dal',
        'Tel',
        'Chi',
        'Chini',
        'Atta',
        'Maida',
        'Artui',
    ];
    public function run(): void
    {
        foreach ($this->commodityNames as $commodity) {
            Commodity::create(['name' => $commodity]);
        }
    }
}
