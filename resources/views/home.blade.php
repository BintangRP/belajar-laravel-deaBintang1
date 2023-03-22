@extends('layout.isGuest')

@section('content')
    <h1>Tampilan {{ $title }}</h1>

    <div class="Articles">
        @foreach ($articles as $article)
            <div class="article">
                <a href="/article/{{ $article->id }}">
                    <h2>{{ $article->title }}</h2>
                </a>
                <button disabled>{{ $article->tag }}</button>
                <p>{{ $article->description }}</p>
                <hr>
            </div>
        @endforeach
    </div>
@endsection
