<nav class="navbar navbar-expand-lg bg-body-tertiary position-fixed w-100 bg-opacity-75"
    style="z-index: 9999;backdrop-filter: blur(9px)">
    <div class="container p-2">
        <img src="{{ asset('logo-notext.svg') }}" class="header-logo me-2" alt="">
        <a class="navbar-brand fw-bold text-uppercase tracking-wide" href="{{ url('/') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <x-nav-link title="Home" link="{{ route('home.index') }}" />

                <x-nav-link title="Browse Jobs" link="{{ route('home.jobs') }}" />

                <x-nav-link title="Employers" link="{{ route('home.employers') }}" />
            </ul>
            @guest
                <a href="{{ route('auth.login') }}" class="btn btn-outline-primary me-2">Login</a>
                <a href="{{ route('auth.register') }}" class="btn btn-primary">Join Now</a>
            @endguest
            @auth
                <div class="vr mx-2"></div>
                <div class="dropdown dropdowend ms-2">
                    <div data-bs-toggle="dropdown" class="d-flex align-items-center cursor-pointer">
                        <img src="https://ui-avatars.com/api/?background=random&length=1&size=35&rounded=true&name={{ auth()->user()->name }}"
                            alt="user_img">
                        <span class="ms-2 fw-bold">{{ auth()->user()->name }}</span>
                    </div>
                    <ul class="dropdown-menu border-0 shadow rounded-3 py-3 px-2">
                        @hasanyrole('Developer|Admin|Employer')
                            <li>
                                <a href="{{ url('/admin') }}" class="dropdown-item p-2 rounded-3">
                                    <i class="fa-solid fa-chart-pie me-1"></i>
                                    Dashboard
                                </a>
                            </li>
                        @endhasanyrole
                        <li>
                            <a class="dropdown-item p-2 rounded-3" href="{{ route('profile.index') }}">
                                <i class="fa-solid fa-user me-2"></i> Profile
                            </a>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li>
                            <a class="dropdown-item p-2 rounded-3 text-danger fw-bold" href="{{ route('auth.logout') }}"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();
                         ">
                                <i class="fa-solid fa-arrow-right-from-bracket me-2"></i> Log Out
                            </a>

                            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth
        </div>
    </div>
</nav>
