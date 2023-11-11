@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1><i class="fa-solid fa-paw"></i> Lista książek</h1>
            </div>
            <div class="col-6">
                <div class="float-right">
                    <a href="{{ route('books.create') }}">
                        <button type="button" class="btn btn-primary"><i class="far fa-plus"></i> Dodaj książkę</button>
                    </a>
                </div>
            </div>
        </div>
        <br>
        <div class="row table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col"># ID</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Tytuł Książki</th>
                    <th scope="col">Opis</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($books as $book)
                    <tr>
                        <th scope="row">{{ $book->id }}</th>
                        <td>{{ $book->author->name }} {{ $book->author->surname }} </td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->description }}</td>
                        <td class="text-right">
                            <a class="btn btn-success btn-xs"
                               href="{{ route('books.show', $book) }}"> Szczegóły </a>
                            <a class="btn btn-info btn-xs"
                               href="{{ route('books.edit', $book) }}">Edycja </a>
                            <form class="d-inline" method="POST"
                                  action="{{ route('books.destroy', $book) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-xs"
                                        onclick="return confirm('Czy napewno chcesz usunąć książkę?')">
                                     Usuń
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <td class="text-center" colspan="4">Brak wyników</td>
                @endforelse
                </tbody>
            </table>
            <div>
                @if ($totalPages > 1)
                    <div>
                        @for ($i = 1; $i <= $totalPages; $i++)
                            <a href="{{ route('books.index', ['page' => $i, 'perPage' => $perPage]) }}" {{ $i == $currentPage ? 'style=color:red;' : '' }}>{{ $i }}</a>
                        @endfor
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection




