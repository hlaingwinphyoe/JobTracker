@extends('layouts.app')

{{-- @section('title')
    Profile : 
@endsection --}}

@section('content')
    <section class="container">
        <div class="row mt-5">
            <div class="col-12 col-md-6">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card shadow-sm mb-4">
                            <div class="card-body">
                                <div class="">
                                    <h5 class="text-capitalize fw-bold mb-3">
                                        Personal Info:
                                    </h5>
                                    <form action="{{ route('profile.changeInfo') }}" method="POST">
                                        @csrf
                                        @method('patch')
                                        <div class="mb-4">
                                            <label for="name" class="form-label">Username</label>
                                            <input type="name"
                                                class="form-control @error('name')
                                                is-invalid
                                            @enderror"
                                                name="name" value="{{ $user->name }}" id="name" required />
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email"
                                                class="form-control @error('email')
                                                is-invalid
                                            @enderror"
                                                name="email" value="{{ $user->email }}" id="email" required />
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="tel"
                                                class="form-control @error('phone')
                                                is-invalid
                                            @enderror"
                                                name="phone" value="{{ $user->phone }}" id="phone" required />
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa-solid fa-arrows-rotate"></i>
                                            Change
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="">
                                    <h5 class="text-capitalize fw-bold mb-3">
                                        Change Password
                                    </h5>
                                    @if ($errors->any())
                                        <div class="text-danger fw-bold">
                                            <ul class="list-unstyled">
                                                @foreach ($errors->all() as $error)
                                                    <li><i class="fa-solid fa-xmark-circle me-1"></i>{{ $error }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('profile.changePassword') }}" method="post">
                                        @csrf
                                        <div class="mb-4">
                                            <label for="current_password" class="form-label">Current Password</label>
                                            <input type="password" class="form-control" name="current_password"
                                                id="current_password" required />
                                        </div>
                                        <div class="mb-4">
                                            <label for="new_password" class="form-label">New Password</label>
                                            <input type="password" class="form-control " name="new_password"
                                                id="new_password" required />

                                        </div>
                                        <div class="mb-4">
                                            <label for="new_confirm_password" class="form-label">Confirm New
                                                Password</label>
                                            <input type="password" class="form-control " name="new_confirm_password"
                                                id="new_confirm_password" required />

                                        </div>
                                        <button class="btn btn-primary">
                                            <i class="fa-solid fa-arrows-rotate"></i>
                                            Change
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card shadow-sm mb-3 mt-4">
                    <div class="card-body">
                        <div class="">
                            <div class="">
                                <h5 class="text-capitalize fw-bold">
                                    Profile Photo
                                </h5>
                            </div>
                            <div class="mt-3">
                                <img src="{{ isset(Auth::user()->photo) ? asset('storage/profile_thumbnails/' . Auth::user()->photo) : asset('images/user_default.png') }}"
                                    id="preview" style="width: 130px;height: 130px"
                                    class="rounded-circle my-2 border border-2 p-1 border-primary" alt="">
                            </div>
                            <form action="{{ route('profile.changePhoto') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="file-upload mt-3">
                                    <button class="file-upload__button btn btn-danger" type="button">Choose File</button>
                                    <span class="file-upload__label"></span>
                                    <input type="file" name="profile_photo" id="upload" class="file-upload__input"
                                        accept="image/jpeg,image/png">
                                </div>
                                <hr>
                                <button class="btn btn-primary text-uppercase"><i
                                        class="fa-solid fa-upload me-1"></i>Upload</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
