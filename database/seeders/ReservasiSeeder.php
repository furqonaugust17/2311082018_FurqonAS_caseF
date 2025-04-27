<?php

namespace Database\Seeders;

use App\Models\Reservasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reservasi::factory(50)->create();
    }
}
