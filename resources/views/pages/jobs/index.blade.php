@extends('layouts.app')
@section('content')
    <section class="container-fluid bg-secondary bg-opacity-25 p-0 mt-5">
        <div class="row">
            <div class="col-12">
                <div class="container py-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <h1 class="text-uppercase mb-3">Search Jobs</h1>
                                <span class="text-secondary">
                                    Search your career opportunity over <span class="fw-bold">12,800</span> jobs
                                </span>
                            </div>
                            <div class="card mb-3 border-0 bg-white shadow-sm rounded-4">
                                <div class="card-body px-4">
                                    <div class="d-flex align-items-center">
                                        <div class="input-group">
                                            <span class="input-group-text border-0" id="basic-addon1">
                                                <i class="fa-solid fa-briefcase"></i>
                                            </span>
                                            <input type="text" class="form-control border-0 search-job-input"
                                                placeholder="Job Title">
                                        </div>
                                        <div class="vr mx-1"></div>

                                        <div class="input-group">
                                            <span class="input-group-text border-0" id="basic-addon1">
                                                <i class="fa-solid fa-earth-asia"></i>
                                            </span>
                                            <select class="form-select border-0 search-job-input">
                                                <option selected>Location</option>
                                                @foreach ($regions as $region)
                                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="vr mx-1"></div>

                                        <div class="input-group">
                                            <span class="input-group-text border-0" id="basic-addon1">
                                                <i class="fa-solid fa-layer-group"></i>
                                            </span>
                                            <select class="form-select border-0 search-job-input">
                                                <option selected>Categories</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- jobs list -->
    <job-index :types="{{ $types }}" />
@endsection
