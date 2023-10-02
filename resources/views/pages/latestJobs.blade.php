<section class="container mx-auto featured-jobs mt-32">
    <div class="flex flex-col items-center justify-center mb-12">
        <h1 class="text-5xl font-bold uppercase">
            Featured Jobs
        </h1>
        <div class="mt-2 h-2 w-60 rounded-full bg-gradient-to-r from-primary-500 via-primary-400 to-tertiary-500">
        </div>
        <p class="text-secondary-500 mt-5">Find the type of work you need clearly define and ready to start.</p>
    </div>
    <latest-jobs :types="{{ $types }}" />
</section>
