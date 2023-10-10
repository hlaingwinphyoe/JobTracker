<section class="w-full px-8 text-secondary-700 bg-white bg-opacity-90 backdrop-blur-sm sticky top-0 z-50">
    <div
        class="md:container flex flex-wrap items-center justify-between py-1 md:py-5 md:mx-auto flex-row w-full md:max-w-9xl">
        <div class="relative flex flex-col md:flex-row">
            <img src="{{ asset('logo-notext.svg') }}" class="h-8 mr-1.5" alt="">
            <a href="{{ route('home.index') }}"
                class="flex items-center mb-5 font-medium text-secondary-900 lg:w-auto lg:items-center lg:justify-center md:mb-0">
                <span
                    class="mx-auto text-xl font-black leading-none text-secondary-900 select-none">{{ config('app.name') }}<span
                        class="text-primary-600">.</span></span>
            </a>
            <nav
                class="hidden md:flex flex-wrap items-center mb-5 text-base md:mb-0 md:pl-8 md:ml-8 md:border-l md:border-gray-200">
                <x-nav-link title="Home" link="{{ route('home.index') }}" />
                <x-nav-link title="Browse Jobs" link="{{ route('home.jobs') }}" />
                <x-nav-link title="Employers" link="{{ route('home.employers') }}" />
                {{-- <x-nav-link title="Blogs" /> --}}
            </nav>
        </div>
        @auth

            <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
                class="flex mx-3 text-sm rounded-full md:mr-0 focus:ring-2 focus:ring-primary-400" type="button">
                <span class="sr-only">Open user menu</span>
                <img src="https://ui-avatars.com/api/?size=40&rounded=true&name={{ auth()->user()->name }}"
                    alt="profile_img">
            </button>

            <!-- Dropdown menu -->
            <div id="dropdownAvatar" class="z-10 hidden bg-white divide-y divide-gray-200 rounded-lg shadow w-44">
                <div class="px-4 py-3 text-sm text-secondary-500 text-center ">
                    <span class="fw-bold text-lg">{{ auth()->user()->name }}</span>
                </div>
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownUserAvatarButton">
                    @role(['Employer', 'Developer', 'Admin'])
                        <li>
                            <a href="{{ route('filament.admin.pages.dashboard') }}" class="block px-4 py-2 hover:bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-layout-2 inline-flex items-center mb-[3px]"
                                    width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    fill="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                    <path d="M4 13m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                    <path d="M14 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                    <path d="M14 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                </svg>
                                Dashboard
                            </a>
                        </li>
                    @endrole
                    @role('Employee')
                        <li>
                            <a href="{{ route('profile.index') }}" class="block px-4 py-2 hover:bg-gray-100">
                                Profile
                            </a>
                        </li>
                    @endrole
                </ul>
                <div class="py-2">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('auth.logout') }}">
                        @csrf

                        <a href="{{ route('auth.logout') }}" class="block px-4 py-2 text-sm text-red-500 hover:bg-gray-100"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-logout inline-flex items-center mb-[3px]" width="20"
                                height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                <path d="M9 12h12l-3 -3" />
                                <path d="M18 15l3 -3" />
                            </svg>
                            Log Out
                        </a>
                    </form>
                </div>
            </div>
        @endauth

        @guest
            <div class="inline-flex items-center ml-5 space-x-6 lg:justify-end">
                <a href="{{ route('auth.login') }}"
                    class="text-base font-medium leading-6 text-gray-600 whitespace-no-wrap transition duration-150 ease-in-out hover:text-gray-900">
                    Sign in
                </a>
                <a href="{{ route('auth.register') }}"
                    class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-primary-500 border border-transparent rounded-md shadow-sm hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600">
                    Sign up
                </a>

                <a href="{{ route('auth.employerLogin') }}" class="btn btn-dark hover-border-1">
                    <span>Post a job</span>
                </a>
            </div>
        @endguest
    </div>
</section>
