@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Szczegóły książki: {{ $book->title }}</div>

                    <div class="card-body">

                        <div class="row mb-3">
                            <label for="surname"
                                   class="col-md-4 col-form-label text-md-end">Imię autora</label>
                            <div class="col-md-6">
                                <input id="surname" type="text"
                                       class="form-control"
                                       value="{{$book->author->surname }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="title"
                                   class="col-md-4 col-form-label text-md-end">Nazwisko autora</label>
                            <div class="col-md-6">
                                <input id="title" type="text"
                                       class="form-control"
                                       value="{{$book->title }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name"
                                   class="col-md-4 col-form-label text-md-end">Tytuł Ksiązki</label>
                            <div class="col-md-6">
                                <input id="name" type="text"
                                       class="form-control"
                                       value="{{$book->author->name }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description"
                                   class="col-md-4 col-form-label text-md-end">Opis</label>
                            <div class="col-md-6">
                                    <textarea id="description" type="text"
                                              class="form-control" disabled>{{ $book->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection






