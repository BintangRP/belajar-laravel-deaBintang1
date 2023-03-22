@extends('layout.isUser')

@section('dashboard')
    <form action="{{ route('dashboard_logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    <div class="header">
        <h1>WELCOME TO {{ $title }}</h1>
    </div>
@endsection
