<!doctype html>
<html lang='en'>

<head>
    <title>@yield('title', 'Bullet Journal')</title>
    <meta charset='utf-8'>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href='/css/bj.css' type='text/css' rel='stylesheet'>

    @yield('head')
</head>

<body>

    <header>
        {{-- <nav>
            <ul>
                <li><a href='/myhome'>Login</a></li>
                <li><a href='/'>Logout</a></li>
                <li><a href=''></a></li>
                <li><a href=''></a></li>
                <li><a href=''></a></li>
            </ul>
        </nav> --}}
    </header>

    <section id='main'>
        @yield('content')
    </section>

    <footer>
        &copy; Bookmark, Inc. {{ config('mail.contact_email') }}
    </footer>

</body>

</html>
