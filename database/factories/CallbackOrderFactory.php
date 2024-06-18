<?php

namespace Database\Factories;

use App\Enums\status;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends Factory<Model>
 */
class CallbackOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'comment' => $this->faker->text,
            'status' => $this->faker->randomElement([status::new, status::inProgress, status::done]),
        ];
    }
}
