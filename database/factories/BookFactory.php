<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'isbn' => $this->faker->unique()->isbn13,
            'author' => $this->faker->name,
            'year_of_publication' => $this->faker->year,
            'publisher' => $this->faker->company,
            'volumes_number' => $this->faker->numberBetween(1, 5),
            'section' => $this->faker->word,
            'bookcase' => $this->faker->numberBetween(1, 10),
            'shelf' => $this->faker->numberBetween(1, 5),
        ];
    }
}
