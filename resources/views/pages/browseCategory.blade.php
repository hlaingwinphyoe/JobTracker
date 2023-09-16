<section class="feature-job">
    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <h1 class="display-4 fw-bold my-2">Browse Category</h1>
                <div class="d-flex align-items-center justify-content-between">
                    <p class="text-secondary">Find the type of work you need, clearly defined and ready to start.</p>
                    <button class="btn btn-primary">
                        Explore More
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
                <div class="row mt-4">
                    @for ($i = 0; $i < 8; $i++)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <h4 class="my-2">Web Designer</h4>
                                    <span class="text-secondary">142 Opening Job</span>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section>
