<section class="container mx-auto category-jobs">
    <div class="flex flex-col md:items-center justify-center mb-12">
        <h1 class="text-5xl font-bold uppercase">
            Browse Category
        </h1>
        <div class="mt-2 h-2 w-40 md:w-96 rounded-full bg-gradient-to-r from-primary-500 via-primary-400 to-tertiary-500"></div>
        <p class="text-secondary-500 mt-5">Find the type of work you need clearly define and ready to start.</p>
    </div>
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
        @foreach ($categories as $category)
            <a href="#"
                class="flex flex-col items-center space-y-7 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                <h5 class="text-2xl text-center font-semibold tracking-tight text-secondary-500">
                    {{ $category->name }}
                </h5>
                <p class="font-normal text-gray-500 text-center">{{ $category->job_posts->count() }} Available Vacancy
                </p>
            </a>
        @endforeach
    </div>
</section>
