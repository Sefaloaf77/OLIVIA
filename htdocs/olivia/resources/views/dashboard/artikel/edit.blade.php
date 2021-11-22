@extends('dashboard/layouts/layoutMain')

@section('container')
    <div class="container mt-5 mb-3">
        <form action="/dashboard/artikel/{{ $artikel->slug }}" method="POST">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required value="{{ old('title', $artikel->title) }}">
            @error('title')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $artikel->slug) }}">
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <select class="form-select" name="category_id">
            @foreach ($categories as $category)
                @if (old("category_id", $artikel->category_id) == $category->id)
                <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                @else 
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
            @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            @error('body')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body', $artikel->body) }}">
            <trix-editor input="body"></trix-editor>
        </div>
        <button type="submit" class="btn btn-primary mb-5">Edit Post</button>
        </form>
    </div>
@endsection