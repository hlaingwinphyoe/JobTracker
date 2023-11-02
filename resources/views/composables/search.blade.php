<section class="bg-tertiary-100 p-8">
    <div class="container mx-auto">
        <div class="mb-8">
            <h1 class="uppercase mb-3 text-3xl text-tertiary-500 font-bold">Search Companies</h1>
            <span class="text-secondary-400">
                Search your career opportunity over <span
                    class="font-semibold text-primary-500">{{ $jobsTotal }}</span> Jobs
            </span>
        </div>
        <form action="">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-3">
                <div class="col-span-2">
                    <label for="title" class="block mb-2 font-medium text-gray-900">
                        Search
                    </label>
                    <input type="text" id="title" name="search" value="{{ request('search') }}"
                        class="bg-white border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                        placeholder="Search">
                </div>
                <div>
                    <label for="region" class="block mb-2 font-medium text-gray-900 dark:text-white">
                        Location
                    </label>
                    <select id="region" name="region"
                        class="bg-white border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                        <option selected value="">Choose Location</option>
                        @foreach ($regions as $region)
                            <option value="{{ $region->slug }}"
                                {{ request('region') == $region->slug ? 'selected' : '' }}>{{ $region->name }}</option>
                        @endforeach
                    </select>
                </div>
                @if (!request()->routeIs('employers.index'))
                    <div>
                        <label for="type" class="block mb-2 font-medium text-gray-900">
                            Type
                        </label>
                        <select id="type" name="type"
                            class="bg-white border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option selected value="">Choose Type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->slug }}"
                                    {{ request('type') == $type->slug ? 'selected' : '' }}>
                                    {{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <div class="mt-[34px] flex items-center">
                    <x-primary-button name="Search" class="rounded-md"></x-primary-button>
                    <a href="{{ request()->url() }}" data-tooltip-target="reset-tooltips"
                        class="p-2.5 bg-red-500 rounded-lg ml-2 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh"
                            width="22" height="22" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                            <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                        </svg>
                    </a>
                    <div id="reset-tooltips" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-500 rounded-lg shadow-sm opacity-0 tooltip">
                        Refresh
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
