<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = $this->paginateBooks($perPage = $request->input('perPage', 10), $request->input('page', 1));

        return view('books.index', [
            'books' => $books['data'],
            'totalPages' => $books['totalPages'],
            'currentPage' => $books['currentPage'],
            'perPage' => $perPage,
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

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::get();

        return view('books.edit', compact('book', 'authors'));
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $validated = $request->validated();
        $authorId = intval($validated['author_id']);

        $book->update($this->getBook($validated, $authorId));

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
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

    private function paginateBooks(int $perPage = 10, int $currentPage = 1): array
    {
        $allBooks = Book::all();
        $totalPages = ceil($allBooks->count() / $perPage);

        $startIndex = ($currentPage - 1) * $perPage;

        $paginatedBooks = $allBooks->slice($startIndex, $perPage);

        return [
            'data' => $paginatedBooks,
            'totalPages' => $totalPages,
            'currentPage' => $currentPage,
        ];
    }
}
