@extends('layout.isGuest')

@section('content')
    <h1>Bintang Rizqi Pasha Login Page</h1>
    <div class="form">
        <form method="POST" action="{{ route('login_action') }}">
            @csrf
            <input type="text" name="username" placeholder="username">
            <input type="password" name="password" placeholder="password">
            <button type="submit">LOGIN</button>
        </form>
    </div>
@endsection
