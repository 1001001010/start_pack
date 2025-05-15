<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{User, Place};
use Illuminate\Database\Eloquent\Factories\Sequence;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'datetime' => $this->faker->dateTime(),
            'status' => $this->faker->randomElement(['подтверждено', 'отменено', 'завершено']),
            'reason' => $this->faker->word(),
            'user_id' => User::factory(),
            'plase_id' => Place::factory(),
        ];
    }
}
