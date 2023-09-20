@extends('layouts.guest')

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
                <div>
                    <h2 class="mb-3">Welcome To {{ config('app.name') }}</h2>
                    <h5>Join Now!</h5>
                    <form class="row g-3 m-1" action="{{ route('register.store') }}" method="POST">
                        @csrf
                        <div class="col-12">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" autocomplete="off"
                                required />
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" id="email" required />
                        </div>
                        <div class="col-12">
                            <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" name="phone" id="phone" required />
                        </div>
                        <div class="col-12 position-relative">
                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                            <input :type="passwordField" class="form-control" name="password" id="password"
                                autocomplete="off" required />
                            <i class="fa-regular fa-eye-slash position-absolute"
                                style="top: 42px; right: 20px;height: 20px;cursor: pointer;"></i>

                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" required />
                                <label class="form-check-label" for="gridCheck">
                                    I accept terms & conditions
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary">Sign Up</button>
                            <a href="{{ route('auth.login') }}" class="btn btn-link">Already Registered? Log In</a>
                        </div>
                    </form>
                </div>
            </div>

        </section>
    </div>
@endsection
