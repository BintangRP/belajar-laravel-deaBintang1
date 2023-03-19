<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DASHBOARD</title>
</head>

<body>
    <div class="">
        <header>
            <nav>
                <a href="/dashboard">Dashboard Utama</a>
                <a href="/dashboard/article">Article</a>
            </nav>
        </header>

        {{-- isi content disini --}}
        <div class="">
            @yield('dashboard')
        </div>
        {{-- end of isi content disini --}}
        <footer>&#169; Deacourse X BintangRP Made With</footer>
    </div>
</body>

</html>
