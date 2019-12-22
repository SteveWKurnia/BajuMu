<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <title>BajuMu - @yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark border-bottom sticky-top bg-dark">
        <a class="navbar-brand" href="#">
            BajuMu
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="/">Home <span class="sr-only">(current)</span></a>
                @if(\Illuminate\Support\Facades\Auth::check())
                    <a class="nav-item nav-link" href="/profile/{{\Illuminate\Support\Facades\Auth::user()->id}}">Profile</a>
                @else
                    <a class="nav-item nav-link" href="/profile">Profile</a>
                @endif

                <a class="nav-item nav-link" href="/cart">Cart</a>
                @if(\Illuminate\Support\Facades\Auth::check())
                    <a class="nav-item nav-link" href="/logout">Logout</a>
                @else
                    <a class="nav-item nav-link" href="/login">Login</a>
                @endif
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer class="card-footer">
        This is a footer
    </footer>
    <script src="{{asset('/js/app.js')}}"></script>
</body>
</html>
