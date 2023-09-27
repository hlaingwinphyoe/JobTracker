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
                    @foreach ($categories as $category)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card mb-4">
                            <div>
                                <div class="card-body text-center ">
                                    <h4 class="my-2">{{$category->name}}</h4>
                                    <span class="text-secondary">{{$category->slug}}</span>
                                </div>   
                            </div>   
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
