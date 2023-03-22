@extends('layout.isGuest')

@section('content')
    <h1>{{ $article->title }}</h1>
    <button disabled>{{ $article->tag }}</button>
    <p>{{ $article->description }}</p>
    <a href="/">Kembali cuy</a>
@endsection
