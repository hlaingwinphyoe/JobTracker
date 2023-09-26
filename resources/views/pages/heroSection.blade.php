<section class="container-fluid home" id="home">
    <div class="row g-5 px-5 align-items-center vh-100 bg-primary-light">
        <div class="col-md-6">
            <p class="h4 text-uppercase">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-circle-dotted d-inline-flex align-items-center mb-1"
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M7.5 4.21l0 .01" />
                    <path d="M4.21 7.5l0 .01" />
                    <path d="M3 12l0 .01" />
                    <path d="M4.21 16.5l0 .01" />
                    <path d="M7.5 19.79l0 .01" />
                    <path d="M12 21l0 .01" />
                    <path d="M16.5 19.79l0 .01" />
                    <path d="M19.79 16.5l0 .01" />
                    <path d="M21 12l0 .01" />
                    <path d="M19.79 7.5l0 .01" />
                    <path d="M16.5 4.21l0 .01" />
                    <path d="M12 3l0 .01" />
                </svg>
                Best Job Place
            </p>
            <h1 class="text-wrap display-1 fw-bold home-title">The Easiest Way to Get Your New Job</h1>
            <h4 class="my-4 text-secondary">Find your dream job today!</h4>
            <div class="card border-0 bg-white shadow-sm rounded-5">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="input-group">
                            <span class="input-group-text border-0 bg-transparent" id="basic-addon1">
                                <i class="fa-solid fa-briefcase"></i>
                            </span>
                            <input type="text" class="form-control border-0 search-job-input"
                                placeholder="Job Title">
                        </div>
                        <div class="vr mx-1"></div>

                        <div class="input-group">
                            <span class="input-group-text border-0 bg-transparent" id="basic-addon1">
                                <i class="fa-solid fa-earth-asia"></i>
                            </span>
                            <select class="form-select border-0 search-job-input">
                                <option selected>Location</option>
                                @foreach ($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="button">Find Now</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <img src="https://via.placeholder.com/500x400" alt="Job Seeker Image"
                class="img-fluid float-end rounded shadow-sm">
        </div>
    </div>
</section>
