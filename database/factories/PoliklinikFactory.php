<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poliklinik>
 */
class PoliklinikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nama_poliklinik = ['Poli Umum', 'Poli Gigi', 'Poli Kandungan', 'Poli Anak'];
        $nol = ['000', '0000', '00000'];
        return [
            'nama_poliklinik' => $this->faker->unique()->randomElement($nama_poliklinik),
            'biaya' => $this->faker->numberBetween(1,99).$this->faker->randomElement($nol),
            'keterangan' => $this->faker->sentence(),
        ];
    }
}
