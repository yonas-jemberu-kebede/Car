<?php

namespace Database\Seeders;

use App\Models\CarMaintainance;
use Illuminate\Database\Seeder;

class CarMaintainanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarMaintainance::factory(10)->create();
    }
}
