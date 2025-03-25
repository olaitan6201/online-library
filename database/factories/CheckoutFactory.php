<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Checkout>
 */
class CheckoutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \DateMalformedStringException
     */
    public function definition(): array
    {
        $checkedOutAt = $this->faker->dateTimeBetween('-1 month', 'now');
        $dueDate = (clone $checkedOutAt)->modify('+10 days');

        return [
            'book_id' => Book::factory(),
            'user_id' => User::factory(),
            'checked_out_at' => $checkedOutAt,
            'due_date' => $dueDate,
            'checked_in_at' => $this->faker->optional(0.3)->dateTimeBetween(
                $checkedOutAt,
                $dueDate
            ),
        ];
    }

    public function overdue(): Factory|CheckoutFactory
    {
        return $this->state(function (array $attributes) {
            $checkedOutAt = $this->faker->dateTimeBetween('-1 month', '-11 days');
            $dueDate = (clone $checkedOutAt)->modify('+10 days');

            return [
                'checked_out_at' => $checkedOutAt,
                'due_date' => $dueDate,
                'checked_in_at' => null,
            ];
        });
    }

    public function current(): Factory|CheckoutFactory
    {
        return $this->state(function (array $attributes) {
            $checkedOutAt = $this->faker->dateTimeBetween('-9 days', 'now');
            $dueDate = (clone $checkedOutAt)->modify('+10 days');

            return [
                'checked_out_at' => $checkedOutAt,
                'due_date' => $dueDate,
                'checked_in_at' => null,
            ];
        });
    }
}
