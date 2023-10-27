<section class="w-full gap-6 px-5 md:px-24 mt-28">
    <div class="flex flex-col md:items-center justify-center mb-12">
        <h1 class="text-5xl font-bold uppercase" id="featured-title">
            Featured Jobs
        </h1>
        <div class="mt-2 h-2 w-40 md:w-60 rounded-full bg-gradient-to-r from-primary-500 via-primary-400 to-tertiary-500">
        </div>
        <p class="text-secondary-500 mt-5" id="featured-desc">Find the type of work you need clearly define and ready to start.</p>
    </div>
    <latest-jobs :types="{{ $types }}" />
</section>
