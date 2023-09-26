@extends('layouts.app')

@section('content')
    <section class="position-relative">
        <section class="bg-profile"></section>
        <section class="container">
            <div class="row my-5">
                <div class="col-12">
                    <div class="">
                        <div class="card w-25 profile-card shadow border-0 rounded-4">
                            <div class="card-body position-relative">
                                <img src="https://ui-avatars.com/api/?background=random&length=1&size=100&name={{ auth()->user()->name }}"
                                    alt="user_img" class="profile-image shadow-sm">

                                <div class="mt-5">
                                    <h5 class="text-center">{{ $user->name }}</h5>
                                    <div>
                                        <span>
                                            <i class="fa-solid fa-location-dot"></i>
                                            {{ $user->region_id }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
