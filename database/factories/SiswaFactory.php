<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Siswa;

class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nis'   => $this->faker->buildingNumber(7),
            'nama'  => $this->faker->name(),
        ];
    }
}
