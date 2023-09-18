<nav class="navbar navbar-expand-lg bg-body-tertiary position-fixed w-100 bg-opacity-75"
    style="z-index: 9999;backdrop-filter: blur(9px)">
    <div class="container p-2">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.jobs') }}">Browse Job</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Employers</a>
                </li>
            </ul>
            @guest
                <a href="{{ route('auth.login') }}" class="btn btn-outline-primary me-2">Login</a>
                <a href="{{ route('auth.register') }}" class="btn btn-primary">Join Now</a>

            @endguest
            @auth
                <a href="{{ url('/admin') }}" class="btn btn-dark">Dashboard</a>
            @endauth
        </div>
    </div>
</nav>
