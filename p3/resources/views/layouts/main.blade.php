<!doctype html>
<html lang='en'>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <title>@yield('title', 'Bullet Journal')</title>
    <meta charset='utf-8'>
    <link rel='stylesheet' href='/css/styles.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    @yield('head')
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href='/'>Bullet Journal</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
                <div class='navbar-nav'>
                    @if (!Auth::user())
                        <a href='/login' class='nav-item active nav-link'>Login</a>
                    @else
                        <a href='/new' class='nav-item nav-link'>Create</a>
                        <form method='POST' id='logout' action='/logout'>
                            {{ csrf_field() }}
                            <a class='nav-item active nav-link' href='#'
                                onClick='document.getElementById("logout").submit();'>Logout</a>
                        </form>
                    @endif
                    <a href='' class='nav-item nav-link'>About</a>
                    <a href='' class='nav-item nav-link'>Contact</a>
                </div>
            </div>
        </nav>
    </header>

    <section id='main' class='container'>
        @yield('content')
    </section>

    <footer>
        &copy; DigitalBulletJournal Inc {{ config('mail.contact_email') }}
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
