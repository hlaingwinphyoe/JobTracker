<section class="w-full px-8 text-secondary-700 bg-white bg-opacity-90 backdrop-blur-sm sticky top-0 z-50">
    <div
        class="md:container flex flex-wrap items-center justify-between py-1 md:py-3 md:mx-auto flex-row w-full md:max-w-9xl">
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

        @if (Auth::guard('employee')->user())
            @include('composables.auth-employee')
        @elseif (Auth::guard('employer')->user())
            @include('composables.auth-employer')
        @elseif (Auth::guard('web')->user())
            @include('composables.auth-admin')
        @else
            @include('composables.join-now')
        @endif

    </div>
</section>
