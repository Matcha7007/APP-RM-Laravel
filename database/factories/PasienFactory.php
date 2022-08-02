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
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'gender_id' => mt_rand(1,2),
            'kategori_id' => mt_rand(1,4),
            'no_hp' => $this->faker->phoneNumber(),
            'nik' => $this->faker->nik(),
            'alamat' => $this->faker->address(),
            'tgl_lahir' => $this->faker->date(),
        ];
    }
}
