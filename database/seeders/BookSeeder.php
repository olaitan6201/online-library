<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;
use App\Models\Checkout;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create 50 books
        $books = Book::factory()
            ->count(50)
            ->create();

        // Create some checkouts for available books
        $books->filter(fn($book) => $book->status === 'checked_out')
            ->each(function ($book) {
                Checkout::factory()
                    ->for($book)
                    ->for(User::inRandomOrder()->first() ?? User::factory())
                    ->create();
            });

        // Create some overdue checkouts
        Checkout::factory()
            ->count(5)
            ->overdue()
            ->create();

        // Create some current checkouts
        Checkout::factory()
            ->count(10)
            ->current()
            ->create();
    }
}
