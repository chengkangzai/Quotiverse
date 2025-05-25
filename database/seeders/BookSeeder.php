<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        // Get the first author (assuming it's the one created in QuoteSeeder)
        $author = Author::first();

        if ($author) {
            // Create some books with the existing author
            Book::factory()
                ->count(5)
                ->create([
                    'author_id' => $author->id,
                ]);
        }

        // Create some books with new authors
        Book::factory()
            ->count(5)
            ->create();
    }
}
