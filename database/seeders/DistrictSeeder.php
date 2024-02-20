<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public $districtNames = [
        'Aizawl',
        'Hnahthial',
        'Kolasib',
        'Lunglei',
        'Saiha',
        'Serchhip',
        'Champhai',
        'Khawzawl',
        'Lawngtlai',
        'Mamit',
        'Saitual',
    ];
    public function run(): void
    {
        foreach ($this->districtNames as $district) {
            District::create(['name' => $district]);
        }
    }
}
