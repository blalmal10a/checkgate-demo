<?php

namespace Database\Seeders;

use App\Models\MeasurementUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeasurementUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public $measurementUnits = [
        [
            'name' => 'Kilogram',
            'abbreviation' => 'Kg',
        ],
        [
            'name' => 'Quintal',
            'abbreviation' => 'qtl',
        ],
        [
            'name' => 'Kilolitre',
            'abbreviation' => 'Kltr',
        ],
        [
            'name' => 'Cylinder',
            'abbreviation' => 'cyl',
        ],
        [
            'name' => 'Bag',
            'abbreviation' => 'bg',
        ],
    ];
    public function run(): void
    {
        foreach ($this->measurementUnits as $data) {
            MeasurementUnit::create($data);
        }
    }
}
