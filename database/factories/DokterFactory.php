<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dokter>
 */
class DokterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'dr. '. $this->faker->name(),
            'slug' => $this->faker->slug(),
            'poli_id' => mt_rand(1,9),
            // 'pelayanan_id' => mt_rand(1,4),
            'gender_id' => mt_rand(1,2),
            'no_hp' => $this->faker->phoneNumber(),
            'jam_start' => $this->faker->time(),
            'jam_end' => $this->faker->time(),
        ];
    }
}
