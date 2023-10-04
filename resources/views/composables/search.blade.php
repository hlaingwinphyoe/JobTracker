<section class="bg-tertiary-100 p-8">
    <div class="container mx-auto">
        <div class="mb-8">
            <h1 class="uppercase mb-3 text-3xl text-tertiary-500 font-bold">Search Companies</h1>
            <span class="text-secondary-400">
                Search your career opportunity over <span class="font-semibold text-primary-500">12,800</span> companies
            </span>
        </div>
        <form action="">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-3">
                <div class="col-span-2">
                    <label for="title" class="block mb-2 font-medium text-gray-900">
                        Search
                    </label>
                    <input type="text" id="title" name="search"
                        class="bg-white border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                        placeholder="Search">
                </div>
                <div>
                    <label for="region" class="block mb-2 font-medium text-gray-900 dark:text-white">
                        Location
                    </label>
                    <select id="region" name="region"
                        class="bg-white border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                        <option selected>Choose Location</option>
                        @foreach ($regions as $region)
                            <option value="{{ $region->id }}">{{ $region->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="type" class="block mb-2 font-medium text-gray-900">
                        Type
                    </label>
                    <select id="type" name="type"
                        class="bg-white border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                        <option selected>Choose Type</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-[34px]">
                    <x-primary-button name="Search" class="rounded-md"></x-primary-button>
                </div>
            </div>
        </form>
    </div>
</section>
