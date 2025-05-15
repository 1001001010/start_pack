<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'fullname' => $this->faker->name(),
            'login' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->numerify("###########"),
            'password' => Hash::make('password'),
        ];
    }
}
