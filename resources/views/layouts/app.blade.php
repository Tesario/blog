<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="shortcut icon" href="/img/code-logo.png" type="image/x-icon">
    <title>@yield('title')</title>
    @livewireStyles
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href={{ url('/') }}><i class="fas fa-home fa-lg"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ Auth::check() ? url('user/' . Auth::user()->id) : url('login') }}">My
                            articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ url('post/create') }}>Add article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ url('user') }}>Users</a>
                    </li>
                </ul>
                @if (Auth::check())
                    <div class="navbar-text d-flex justify-content-center">
                        <div class="nav-link"><a
                                href="{{ url('user/' . Auth::user()->id . '/profile') }}">{{ Auth::user()->email }}</a>
                        </div>
                        <a class="nav-link" href="{{ url('logout') }}">Logout</a>
                    </div>
                @else
                    <div class="navbar-text d-flex justify-content-center">
                        <a class="nav-link" href="{{ url('login') }}">Login</a>
                        <a class="nav-link" href="{{ url('register') }}">Register</a>
                    </div>
                @endif
            </div>
        </div>
    </nav>

    <header id="header" class="container">
        <h1 class="text-center">Usefull tools and links for developers</h1>
        <span></span>
    </header>

    <main>
        @yield('content')
    </main>

    <footer id="footer">
        <div class="container">
            <p>Code & design by <a href="http://tesario.4fan.cz">Vojtěch Tesař</a></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
        integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous">
    </script>
    @livewireScripts
</body>

</html>
