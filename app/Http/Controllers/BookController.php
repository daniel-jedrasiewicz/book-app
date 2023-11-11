<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('books.index', [
            'books' => Book::with('author')->get(),
        ]);
    }

    public function create()
    {
        return view('books.create', [
           'authors' => Author::get(),
        ]);
    }

    public function store(BookRequest $request, Book $book)
    {
        $validated = $request->validated();

        if ($validated['selected_author_id'] == null) {
            $author = Author::create($this->getAuthor($validated));
        }

        $authorId = isset($author) ? $author->id : $validated['selected_author_id'];

        $book->create($this->getBook($validated, $authorId));

        return redirect()->route('books.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    private function getAuthor(array $data): array
    {
        return
            [
                'name' => $data['author']['name'],
                'surname' => $data['author']['surname']
            ];
    }

    private function getBook(array $data, int $authorId): array
    {
        return [
            'title' => $data['book']['title'],
            'description' => $data['book']['description'],
            'author_id' => $authorId
        ];
    }
}
