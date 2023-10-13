<section class="w-full px-8 text-secondary-700 bg-white bg-opacity-90 backdrop-blur-sm sticky top-0 z-50">
    <div class="md:container flex items-center justify-between py-1 md:py-3 md:mx-auto flex-row w-full md:max-w-9xl">
        <div class="relative flex flex-col md:flex-row">
            <a href="{{ route('home.index') }}">
                <img src="{{ asset('logo.png') }}" class="h-8 mr-1.5" alt="">
            </a>
            <a href="{{ route('home.index') }}"
                class="flex items-center mb-5 font-medium text-secondary-900 lg:w-auto lg:items-center lg:justify-center md:mb-0">
                <span
                    class="mx-auto text-xl font-black leading-none text-secondary-900 select-none">{{ config('app.name') }}<span
                        class="text-primary-600">.</span></span>
            </a>
            <nav
                class="hidden md:flex flex-wrap items-center mb-5 text-base md:mb-0 md:pl-8 md:ml-8 md:border-l md:border-gray-200">
                <x-nav-link title="Home" link="{{ route('home.index') }}"
                    class="{{ request()->routeIs('home.*') ? 'border-b-2 border-primary-500 text-black' : '' }}" />
                <x-nav-link title="Browse Jobs" link="{{ route('jobs.index') }}"
                    class="{{ request()->routeIs('jobs.*') ? 'border-b-2 border-primary-500 text-black' : '' }}" />
                <x-nav-link title="Employers" link="{{ route('employers.index') }}"
                    class="{{ request()->routeIs('employers.*') ? 'border-b-2 border-primary-500 text-black' : '' }}" />

                {{-- <x-nav-link title="Blogs" /> --}}

                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                    class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-600 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-primary-500 md:p-0 md:w-auto">Settings
                    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownNavbar"
                    class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                        <li>
                            <a href="{{ route('faq') }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">FAQs</a>
                        </li>
                        <li>
                            <a href="{{ route('policy') }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="{{ route('terms') }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Terms & Conditions</a>
                        </li>
                    </ul>
                </div>


                @if (Auth::guard('employee')->user())
                    <x-nav-link title="Profile" link="{{ route('profile.index') }}"
                        class="{{ request()->routeIs('profile.*') ? 'border-b-2 border-primary-500 text-black' : '' }} ml-3" />
                @elseif(Auth::user())
                    <x-nav-link title="Dashboard" link="{{ route('filament.admin.pages.dashboard') }} ml-3" />
                @endif
            </nav>
        </div>

        @if (Auth::guard('employee')->user())
            @include('composables.auth-employee')
        @elseif (Auth::user())
            @include('composables.auth-admin')
        @else
            @include('composables.join-now')
        @endif

    </div>
</section>
