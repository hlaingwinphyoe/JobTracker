<section class="feature-job">
    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <h1 class="text-2xl fw-bold my-2">Latest Jobs</h1>
                {{-- <div class="d-flex align-items-center justify-content-between">
                    <p class="text-secondary">Find the type of work you need, clearly defined and ready to start.</p>
                    <button class="btn btn-primary">
                        Explore More
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div> --}}

                <!-- Category Tab -->
                <div class="py-2">
                    <ul class="nav nav-pills align-items-center justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">All</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Web Design</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Marketing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">System Analytic</a>
                        </li>
                    </ul>
                </div>

                <!-- Job List -->
                <div class="row mt-4">
                    @for ($i = 0; $i < 8; $i++)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card mb-4">
                                <img src="https://via.placeholder.com/600x400" alt="Job Seeker Image"
                                    class="card-img-top">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <img src="https://via.placeholder.com/40x40" alt="Job Seeker Image"
                                                class="rounded-circle">
                                            <span>Paul Marker</span>
                                        </div>
                                        <div>
                                            <small
                                                class="py-1 px-2 fw-semibold text-success-emphasis bg-warning-subtle border border-warning-subtle rounded-2">Full
                                                Time</small>
                                        </div>
                                    </div>
                                    <article class="my-3">
                                        <a href="#" class="h6 text-decoration-none d-block fw-bold">Senior Full Stack
                                            Engineer</a>
                                        <small class="text-secondary me-3">
                                            <i class="fa-regular fa-clock"></i>
                                            3 mins ago
                                        </small>
                                        <small class="text-secondary">
                                            <i class="fa-solid fa-location-dot"></i>
                                            Mandalay
                                        </small>
                                    </article>

                                    <article class="my-2 d-flex justify-content-between align-items-center">
                                        <h4 class="text-primary">3400$</h4>
                                        <span class="text-secondary">
                                            <i class="fa-regular fa-bookmark fa-lg"></i>
                                        </span>
                                    </article>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section>
