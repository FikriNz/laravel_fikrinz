<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pasien>
 */
class PasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_pasien'       => $this->faker->name(),
            'alamat'            => $this->faker->address(),
            'telepon'           => $this->faker->phoneNumber(),
            'id_rumah_sakit'    => mt_rand(1, 20)
        ];
    }
}
