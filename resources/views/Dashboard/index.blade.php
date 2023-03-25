@extends('layout.isUser')

@section('dashboard')
    <form action="{{ route('dashboard_logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    <div class="header">
        <h1>WELCOME TO {{ $title }}</h1>
    </div>

    <div class="notification">
        <i style="color:green">{{ session()->get('success') }}</i>
        <i style="color:green">{{ session()->get('error') }}</i>
    </div>

    <hr>

    <form action="{{ route('article_create') }}">
        @csrf
        <button type="submit">Tambah Article</button>
    </form>

    <table border="1">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Tag</th>
            <th>Update</th>
        </tr>
        @foreach ($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->description }}</td>
                <td>{{ $article->tag }}</td>
                <td>
                    <a href="/article/{{ $article->id }}/edit">Edit</a>
                    <form method="POST" action="{{ route('article_delete') }}">
                        @csrf
                        <button type="submit" value="{{ $article->id }}">Hapus</button>
                    </form>

                </td>
            </tr>
        @endforeach
    </table>
@endsection
