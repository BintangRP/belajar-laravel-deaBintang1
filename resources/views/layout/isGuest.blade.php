<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BintangXDea Course</title>
</head>

<body>
    <div class="">
        <header>
            <nav>
                <a href="/">HOME</a>
                <a href="/login">LOGIN</a>
            </nav>
        </header>

        {{-- isi content disini --}}
        <div class="">
            @yield('content')
        </div>
        {{-- end of isi content disini --}}
        <footer>&#169; Deacourse X BintangRP Made With ❤</footer>
    </div>
</body>

</html>
