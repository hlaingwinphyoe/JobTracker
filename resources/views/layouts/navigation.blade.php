<section class="w-full px-8 text-gray-700 bg-white backdrop-blur-lg sticky top-0">
    <div class="container flex flex-col flex-wrap items-center justify-between py-5 mx-auto md:flex-row max-w-7xl">
        <div class="relative flex flex-col md:flex-row">
            <img src="{{ asset('logo-notext.svg') }}" class="h-8 mr-1.5" alt="">
            <a href="{{ route("home.index") }}"
                class="flex items-center mb-5 font-medium text-gray-900 lg:w-auto lg:items-center lg:justify-center md:mb-0">
                <span class="mx-auto text-xl font-black leading-none text-gray-900 select-none">{{ config('app.name') }}<span
                        class="text-primary-600">.</span></span>
            </a>
            <nav
                class="flex flex-wrap items-center mb-5 text-base md:mb-0 md:pl-8 md:ml-8 md:border-l md:border-gray-200">
                <x-nav-link title="Home" link="{{ route('home.index') }}" />
                <x-nav-link title="Browse Jobs" link="{{ route('home.jobs') }}" />
                <x-nav-link title="Employers" link="{{ route('home.employers') }}" />
                <x-nav-link title="Blogs" />
            </nav>
        </div>

        <div class="inline-flex items-center ml-5 space-x-6 lg:justify-end">
            <a href="{{ route('auth.login') }}"
                class="text-base font-medium leading-6 text-gray-600 whitespace-no-wrap transition duration-150 ease-in-out hover:text-gray-900">
                Sign in
            </a>
            <a href="{{ route('auth.register') }}"
                class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-primary-500 border border-transparent rounded-md shadow-sm hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600">
                Sign up
            </a>
        </div>
    </div>
</section>
