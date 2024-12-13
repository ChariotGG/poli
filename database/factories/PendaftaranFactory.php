<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pendaftaran>
 */
class PendaftaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $idPasien = \App\Models\Pasien::pluck('pasien_id')->toArray();
        $idPoli = \App\Models\Poliklinik::pluck('poliklinik_id')->toArray();
        return [
            'pasien_id' => $this->faker->randomElement($idPasien),
            'tanggal_pendaftaran' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'poliklinik_id' => $this->faker->randomElement($idPoli),
            'keluhan' => $this->faker->sentence(),
            'diagnosis' => $this->faker->sentence(),
            'tindakan' => $this->faker->sentence(),
        ];
    }
}
