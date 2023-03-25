@extends('layout.isUser')

@section('dashboard')
    <i style="color:red">{{ session()->get('success') }}</i>
    <i style="color:red">{{ session()->get('error') }}</i>
    <form method="POST" action="{{ route('article_update') }}">
        @csrf
        <h1>Article {{ $article->id }}</h1>
        <input type="hidden" name="id" value="{{ $article->id }}">
        <div class="judul">
            <label for="title">Title:</label>
            <input type="text" name="judul" value="{{ $article->title }}">
        </div>

        <div class="deskripsi">
            <p for="description">Description:</p>
            <textarea name="deskripsi" cols="30" rows="10">{{ $article->description }}</textarea>
        </div>

        <div class="tag">
            <label for="tag">Tag:</label>
            <input type="text" name="tag" value="{{ $article->tag }}">
        </div>

        <button type="submit">Update</button>
    </form>
@endsection
