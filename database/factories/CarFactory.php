<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $car = [
            [
                "brand" => 'Kia',
                "models" => [
                    'Picanto',
                    'Rio',
                    'Soul',
                ],
            ],
            [
                "brand" => 'Toyota',
                "models" => [
                    'Corolla',
                    'Camry',
                    'RAV4',
                ],
            ],
            [
                "brand" => 'Mitsubishi',
                "models" => [
                    'ASX',
                    'Pajero Sport',
                    'Outlander',
                ],
            ],
        ];

        $car_selected = rand(0, count($car) - 1);
        $model_selected = rand(0, count($car[ $car_selected ]["models"]) - 1);

        return [
            'name' => "{$car[ $car_selected ]["brand"]} {$car[ $car_selected ]["models"][ $model_selected ]}",
            'number' => sprintf('%s%03d%s%02d',
                $this->faker->randomElement(['A', 'B', 'E', 'K', 'M', 'H', 'O', 'P', 'T', 'Y', 'X']),
                $this->faker->numberBetween(1, 999),
                implode('', $this->faker->randomElements(['A', 'B', 'E', 'K', 'M', 'H', 'O', 'P', 'T', 'Y', 'X'], 2)),
                $this->faker->numberBetween(0, 99),
            )
        ];
    }
}
