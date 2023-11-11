@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edycja książki: {{ $book->title }}</div>

                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="{{ route('books.update', $book) }}"
                              novalidate>
                            @method('PUT')
                            @csrf
                            <div class="row mb-3">
                                <label for="author_id"
                                       class="col-md-4 col-form-label text-md-end">Wybierz lud Dodaj Autora</label>

                                <div class="col-md-6">
                                    <select name="author_id" id="author_id" class="select2 @error('author_id') is-invalid @enderror"
                                            style="width: 100%;">
                                        <option value="" selected>Wybierz</option>
                                        @foreach($authors as $author)
                                            <option value="{{ $author->id }}"
                                                @selected(old('author_id', $book->author->id ?? "") == $author->id)>
                                                {{ $author->name }} {{ $author->surname }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('author_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-end">Tytuł Ksiązki <span
                                        style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    <input id="title" maxlength="100" type="text"
                                           class="form-control @error('book.title') is-invalid @enderror" name="book[title]"
                                           value="{{ old('book.title') ?? $book->title }}">

                                    @error('book.title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description"
                                       class="col-md-4 col-form-label text-md-end">Opis<span
                                        style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    <textarea id="description" maxlength="500" type="text"
                                              class="form-control @error('book.description') is-invalid @enderror"
                                              name="book[description]"
                                              required>{{ old('book.description') ?? $book->description }}</textarea>

                                    @error('book.description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Zapisz
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endsection





