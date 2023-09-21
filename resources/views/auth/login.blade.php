@extends('layouts.auth')

@section('content')
    <div class="container-fluid custom-container-fluid px-0 mx-0">
        <div class="blob-container">
            <div class="blob"></div>
            <div class="blob one"></div>
            <div class="blob two"></div>
            <div class="blob three"></div>
            <div class="blob four"></div>
            <div class="blob five"></div>
            <div class="blob six"></div>
            <div class="blob seven"></div>
            <div class="blob eight"></div>
            <div class="blob nine"></div>
            <div class="blob ten"></div>
        </div>

        <section class="blob-section">
            <div class="card blob-card border-0">
                <img src="logo.png" class="h-100 w-100" alt="" />
                <div class="d-flex flex-column justify-content-center">
                    <h2 class="mb-3">Welcome Back!</h2>
                    <h5 class="mb-3">Please Log In.</h5>

                    @if ($errors->any())
                        <div class="text-danger fw-bold">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li><i class="fa-solid fa-xmark-circle me-1"></i>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="row g-3" action="{{ route('login.store') }}" method="POST">
                        @csrf
                        <div class="col-12">
                            <label for="login" class="form-label">Username, Email or Phone<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="credentials" id="login" required />
                        </div>
                        <div class="col-12 position-relative">
                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control " name="password" id="password" autocomplete="off"
                                required />
                            <i class="fa-regular fa-eye-slash position-absolute"
                                style="top: 42px; right: 20px;height: 20px;cursor: pointer;"></i>

                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" required />
                                <label class="form-check-label" for="gridCheck">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary">Login</button>
                            <div class="mt-2">
                                Not Registered?
                                <a href="{{ route('auth.register') }}" class="btn btn-link ps-1">
                                    Create Account
                                </a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </section>
    </div>
@endsection
