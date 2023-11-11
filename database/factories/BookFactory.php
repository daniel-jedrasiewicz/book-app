<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    public function definition(): array
    {
        $author = Author::create([
           'name' => $this->faker->firstName,
           'surname' => $this->faker->lastName,
        ]);

        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'author_id' => $author->id,
        ];
    }
}
