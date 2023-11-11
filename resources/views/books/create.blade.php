@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dodawanie nowej książki</div>

                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="{{ route('books.store') }}" novalidate>
                            @csrf

                            <div class="row mb-3">
                                <label for="selected_author_id"
                                       class="col-md-4 col-form-label text-md-end">Wybierz lud Dodaj Autora</label>

                                <div class="col-md-6">
                                    <select name="selected_author_id" id="author" class="select2"
                                            style="width: 100%;">
                                        <option value="" selected>Wybierz</option>
                                        @foreach($authors as $author)
                                            <option value="{{ $author->id }}" data-author-name="{{ $author->name }}"
                                                    data-author-surname="{{ $author->surname }}">{{ $author->name }} {{ $author->surname }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-end">Imię <span
                                        style="color: red;">*</span></label>
                                <div class="col-md-6">
                                    <input id="name" maxlength="100" type="text"
                                           class="form-control @error('author.name') is-invalid @enderror"
                                           name="author[name]"
                                           value="{{ old('author.name') }}" required>

                                    @error('author.name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="surname"
                                       class="col-md-4 col-form-label text-md-end">Nazwisko <span
                                        style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    <input id="surname" maxlength="100" type="text"
                                           class="form-control @error('author.surname') is-invalid @enderror"
                                           name="author[surname]"
                                           value="{{ old('author.surname') }}" required>

                                    @error('author.surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-end">Tytuł Ksiązki <span
                                        style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    <input id="title" maxlength="100" type="text"
                                           class="form-control @error('book.title') is-invalid @enderror" name="book[title]"
                                           value="{{ old('book.title') }}">

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
                                    <textarea id="description" maxlength="100" type="text"
                                           class="form-control @error('book.description') is-invalid @enderror"
                                           name="book[description]"
                                             required>{{ old('book.description') }}</textarea>

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
                                        Dodaj
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

            $('#author').on('change', function () {

                const selectedAuthorName = $(this).find(':selected').data('author-name');
                const selectedAuthorSurname = $(this).find(':selected').data('author-surname');

                $('input[name="author[name]').val(selectedAuthorName);
                $('input[name="author[surname]').val(selectedAuthorSurname);
            });


        });

    </script>

@endsection





