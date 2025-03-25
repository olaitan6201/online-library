<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'isbn' => $this->faker->unique()->isbn13(),
            'revision_number' => $this->faker->randomDigitNotNull(),
            'published_date' => $this->faker->dateTimeBetween('-10 years', '-1 year'),
            'publisher' => $this->faker->company(),
            'author' => $this->faker->name(),
            'date_added' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'genre' => $this->faker->randomElement([
                'Fiction', 'Non-Fiction', 'Science',
                'History', 'Biography', 'Fantasy', 'Mystery',
            ]),
            'cover_image_path' => 'book-covers/'.$this->faker->image(
                    dir: storage_path('app/public/book-covers'),
                    width: 400,
                    height: 600,
                    category: 'book',
                    fullPath: false
                ),
            'description' => $this->faker->paragraphs(3, true),
            'pages' => $this->faker->numberBetween(100, 800),
            'status' => $this->faker->randomElement(['available', 'available', 'available', 'checked_out']),
        ];
    }
}
