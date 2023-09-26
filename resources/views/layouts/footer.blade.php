<footer class="container">
    <div class="row">
        <div class="col-3">
            <div class="d-flex align-items-center">
                <img src="{{ asset('logo.png') }}" class="logo" alt="">
                <h3>{{ config('app.name') }}</h3>
            </div>
            <div class="d-flex justify-content-center align-items-center mb-4">
                <a href="javascript:void(0)" class="text-decoration-none me-3" style="color: #0e89f0">
                    <i class="fa-brands fa-facebook fa-2xl"></i>
                </a>

                <a href="javascript:void(0)" class="text-decoration-none me-3 text-dark">
                    <i class="fa-brands fa-github fa-2xl"></i>
                </a>

                <a href="javascript:void(0)" class="text-decoration-none me-3" style="color: #664bcb">
                    <i class="fa-brands fa-viber fa-2xl"></i>
                </a>

                <a href="javascript:void(0)" class="text-decoration-none text-dark">
                    <i class="fa-brands fa-x-twitter fa-2xl"></i>
                </a>
            </div>

            <p class="my-3 text-secondary" style="hyphens: auto">{{ config('app.name') }} is the job offering service and best
                resource to discover various jobs around local.</p>

        </div>
        <div class="col-3 mt-3">
            <h5>Links</h5>
            <ul class="list-unstyled my-4">
                <li class="my-2">
                    <a href="#" class="text-decoration-none">Home</a>
                </li>
                <li class="my-2">
                    <a href="#" class="text-decoration-none">About Us</a>
                </li>
                <li class="my-2">
                    <a href="#" class="text-decoration-none">Our Team</a>
                </li>
                <li class="my-2">
                    <a href="#" class="text-decoration-none">Contact Us</a>
                </li>
            </ul>
        </div>

        <div class="col-3 mt-3">
            <h5>Community</h5>
            <ul class="list-unstyled my-4">
                <li class="my-2">
                    <a href="#" class="text-decoration-none">Latest Jobs</a>
                </li>
                <li class="my-2">
                    <a href="#" class="text-decoration-none">Join Now</a>
                </li>
            </ul>
        </div>

        <div class="col-3 mt-3">
            <h5>Support</h5>
            <ul class="list-unstyled my-4">
                <li class="my-2">
                    <a href="#" class="text-decoration-none">FAQs</a>
                </li>

                <li class="my-2">
                    <a href="#" class="text-decoration-none">Privacy Policy</a>
                </li>

                <li class="my-2">
                    <a href="#" class="text-decoration-none">Terms & Conditions</a>
                </li>
            </ul>
        </div>
        <div class="col-12 text-center">
            <div class="position-relative">
                <a href="#home"
                    class="btn btn-light bg-primary-subtle border-0 shadow-sm rounded-circle position-absolute z-3"
                    style="top: -3px">
                    <i class="fa-solid fa-angles-up"></i>
                </a>
            </div>
            <hr>
            <span>Copyright &copy;{{ now()->format('Y') }}</span>
            <a href="{{ url('/') }}" class="text-decoration-none">
                {{ config('app.name') }}.
            </a>
            <span>All Rights Reserved.</span>
        </div>
    </div>
</footer>
