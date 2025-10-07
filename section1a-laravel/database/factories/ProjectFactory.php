<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'        => $this->faker->unique()->sentence(3), // e.g., "Alpha Launch Plan"
            'description' => $this->faker->paragraph(),
            'start_date'  => $this->faker->date(),
            'end_date'    => $this->faker->date(),
        ];
    }
}
