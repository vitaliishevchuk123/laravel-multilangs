<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => [
                'uk' => fake('uk_UA')->name(),
                'en' => fake()->name(rand(1, 5)),
                'ru' => fake('ru_RU')->name(),
            ]
        ];
    }
}
