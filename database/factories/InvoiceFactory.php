<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = $this->faker;
        $paid = $faker->boolean();

        return [
            'user_id' => User::all()->random()->id,
            'type'    => $faker->randomElement(['B', 'C', 'P']),
            'paid'    => $paid,
            'value'   => $faker->numberBetween(1000, 10000),
            'payment_date' => $paid
                ? $faker->randomElement([$faker->dateTimeThisMonth()])
                : null
        ];
    }
}
