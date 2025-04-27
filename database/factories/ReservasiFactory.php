<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservasi>
 */
class ReservasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('id_ID');
        $nomor_meja = ['A1', 'A2', 'A3', 'B1', 'B2', 'B3'];
        $status = ['terjadwal', 'hadir', 'dibatalkan'];
        return [
            'nama_pelanggan' => $faker->name(),
            'nomor_meja'    => $nomor_meja[$faker->numberBetween(0, 5)],
            'jumlah_orang'  => $faker->numberBetween(1, 4),
            'tanggal_reservasi' => $faker->date(),
            'waktu_reservasi'   => $faker->time('H:i'),
            'catatan_khusus'    => $faker->sentence(),
            'status'            => $status[$faker->numberBetween(0, 2)]
        ];
    }
}
