<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        logger(date('Y-m-d H:i:s'));
        \App\Models\User::factory(100)->create();
        logger(date('Y-m-d H:i:s'));
    }
}
