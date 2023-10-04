<section class="container mx-auto category-jobs">
    <div class="flex flex-col items-center justify-center mb-12">
        <h1 class="text-5xl font-bold uppercase">
            Browse Category
        </h1>
        <div class="mt-2 h-2 w-96 rounded-full bg-gradient-to-r from-primary-500 via-primary-400 to-tertiary-500"></div>
        <p class="text-secondary-500 mt-5">Find the type of work you need clearly define and ready to start.</p>
    </div>
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($categories as $category)
            <a href="#"
                class="flex flex-col items-center space-y-7 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                <h5 class="text-2xl text-center font-semibold tracking-tight text-secondary-500">
                    {{ $category->name }}
                </h5>
                <p class="font-normal text-secondary-400 text-center">{{ $category->slug }}</p>
            </a>
        @endforeach
        <a href="#"
            class="flex flex-col items-center space-y-2 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
            <h5 class="text-3xl text-center font-semibold tracking-tight text-secondary-500">
                <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 via-primary-400 to-tertiary-500 ">
                    1200+
                </span>
                <span class="text-2xl uppercase">Jobs</span>
            </h5>
            <x-primary-button name="Explore More" class="rounded-xl group">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-arrow-narrow-right ml-1 hidden group-hover:block" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l14 0" />
                    <path d="M15 16l4 -4" />
                    <path d="M15 8l4 4" />
                </svg>
            </x-primary-button>
        </a>
    </div>
</section>
