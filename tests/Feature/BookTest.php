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

    public function testUpdateBook()
    {
        $book = Book::factory()->create();

        $author = Author::create([
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
        ]);

        $updatedData = [
            'book' => [
                'title' => $this->faker->sentence,
                'description' => $this->faker->paragraph,
            ],
            'author_id' => $author->id,
        ];

        $response = $this->put(route('books.update', ['book' => $book]), $updatedData);

        $response->assertStatus(302);
        $response->assertRedirect(route('books.index'));

        $this->assertDatabaseCount('books', 1);

        $updatedBook = Book::find($book->id);

        $this->assertEquals($updatedData['book']['title'], $updatedBook->title);
        $this->assertEquals($updatedData['book']['description'], $updatedBook->description);
        $this->assertEquals($updatedData['author_id'], $updatedBook->author_id);
    }
}
