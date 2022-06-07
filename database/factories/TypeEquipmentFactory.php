<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TypeEquipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'equipment' => $this->faker->numerify('Glob ###'),
            'mask' => $this->faker->regexify('[AaNZX]{3}'),
        ];
    }
}
