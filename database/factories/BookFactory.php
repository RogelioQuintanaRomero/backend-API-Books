<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title'=>$this->faker->sentence(),
            'anio'=>$this->faker->numberBetween(1600,9999)
        ];
    }
}
