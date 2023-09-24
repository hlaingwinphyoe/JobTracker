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
                    <a class="nav-link" href="{{ route('home.employers') }}">Employers</a>
                </li>
            </ul>
            @guest
                <a href="{{ route('auth.login') }}" class="btn btn-outline-primary me-2">Login</a>
                <a href="{{ route('auth.register') }}" class="btn btn-primary">Join Now</a>
            @endguest
            @auth
                <div class="dropdown dropstart">
                    <img src="https://ui-avatars.com/api/?background=random&length=1&size=35&rounded=true&name={{ auth()->user()->name }}"
                        class="cursor-pointer" alt="" data-bs-toggle="dropdown">
                    <ul class="dropdown-menu border-0 shadow rounded-4 py-3 px-2">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.index') }}">
                                <i class="fa-regular fa-user me-1"></i> Profile
                            </a>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li>
                            <a class="dropdown-item" href="{{ route('auth.logout') }}"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();
                         ">
                                <i class="fa-solid fa-arrow-right text-danger me-1"></i> Log Out
                            </a>

                            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>

                @hasanyrole('Developer|Admin|Employer')
                    <a href="{{ url('/admin') }}" class="btn btn-light ms-1">Dashboard</a>
                @endhasanyrole
            @endauth
        </div>
    </div>
</nav>
