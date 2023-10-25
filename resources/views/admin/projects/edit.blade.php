@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-success">
            Torna alla lista
        </a>

        <h1>Modifica Project</h1>

        <form action="{{ route('admin.projects.update', $projects) }}" method="POST">
            @csrf {{-- Aggiunge il token CSRF --}}
            @method('PUT') {{-- Utilizza il metodo PUT per l'aggiornamento --}}

            <div class="row">
                <div class="col-3">
                    <label for="title">Titolo</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $projects->title) }}"
                        class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="row">
                    <label class="tiping my-3" for="type">Tipologia</label>
                    <select class="form-select w-25" id="type" name="type_id">
                        <option value=""></option>
                        @foreach ($types as $type)
                            <option @selected($type->id == old('type_id', $projects->type?->id)) value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>

                <div class="col-3">
                    <label for="content">Content</label>
                    <input type="content" id="content" name="content" value="{{ old('content', $projects->title) }}"
                        class="form-control @error('title') is-invalid @enderror">
                    </select>
                    @error('type')
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
                    <input type="text" class="form-control @error('created_at') is-invalid @enderror" id="created"
                        name="created" value="{{ old('created_at') }}">
                    @error('created_at')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-3">
                    <label for="updated">Update</label>
                    <textarea id="updated" name="updated" class="form-control @error('updated_at') is-invalid @enderror">{{ old('updated_at', $projects->updated_at) }}</textarea>
                    @error('updated_at')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection
