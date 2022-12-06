<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => strtoupper(fake()->firstNameFemale),
            'name' => fake()->name,
            'date_of_birth' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'country' => fake()->country,
            'story' => '',
            'image' => '',
        ];
    }
}
