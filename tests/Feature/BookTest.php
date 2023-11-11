<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testCreateBook()
    {

        $author = Author::create([
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
        ]);

        $response = $this->post(route('books.store'), [
            'book' => [
                'title' => $this->faker->sentence,
                'description' => $this->faker->paragraph,
            ],
            'author' => [
                'name' => $author->name,
                'surname' => $author->surname,
            ],
            'author_id' => $author->id,
            'selected_author_id' => 0,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('books.index'));

        $this->assertDatabaseCount('books', 1);
    }

    public function testDeleteBook()
    {

        $book = Book::factory()->create();

        $response = $this->delete(route('books.destroy', ['book' => $book]));

        $response->assertStatus(302);

        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }
}
