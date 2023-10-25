@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1>Crea un nuovo Comic</h1>
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="type_id" class="tiping my-3">Inserisci la tipologia</label>
                        <!-- Corretto "type" a "type_id" -->
                        <select class="form-select w-50 mx-auto" id="type_id" name="type_id">
                            <!-- Corretto "type" a "type_id" -->
                            <option value=""></option>
                            @foreach ($types as $type)
                                {{-- Controlla se il valore dell'input type_id inviato con la richiesta POST (utilizzando la funzione old()) è uguale all'id della tipologia di progetto ($type->id). Se questa condizione è vera, allora aggiunge l'attributo HTML selected all'elemento <option>. Questo attributo rende l'opzione preselezionata nel campo di selezione. --}}
                                <option class="text-center" @if (old('type_id') == $type->id) selected @endif
                                    value="{{ $type->id }}">
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="content" class="form-label">Titolo</label>
                            <input type="text" class="form-control @error('content') is-invalid @enderror" id="content"
                                name="content" value="{{ old('content') }}">
                            @error('content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <textarea class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" rows="4">{{ old('slug') }}</textarea>
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="created" class="form-label">Created at</label>
                            <input type="text" class="form-control @error('created') is-invalid @enderror" id="created"
                                name="created" value="{{ old('created') }}">
                            @error('created')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="updated" class="form-label">Updated at</label>
                            <input type="text" class="form-control @error('updated') is-invalid @enderror" id="updated"
                                name="updated" value="{{ old('updated') }}">
                            @error('updated')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection
