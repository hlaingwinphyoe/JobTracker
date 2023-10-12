<button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
    class="flex mx-3 text-sm rounded-full md:mr-0 focus:ring-2 focus:ring-primary-400" type="button">
    <span class="sr-only">Open user menu</span>
    <img src="https://ui-avatars.com/api/?size=40&rounded=true&name={{ Auth::user()->name }}" alt="profile_img">
</button>

<!-- Dropdown menu -->
<div id="dropdownAvatar" class="z-10 hidden bg-white divide-y divide-gray-200 rounded-lg shadow w-44">
    <div class="px-4 py-3 text-sm text-secondary-500 text-center ">
        <span class="fw-bold text-lg">{{ Auth::user()->name }}</span>
    </div>
    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownUserAvatarButton">
        <li>
            <a href="{{ route('filament.admin.pages.dashboard') }}" class="block px-4 py-2 hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-layout-2 inline-flex items-center mb-[3px]" width="20"
                    height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="currentColor"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                    <path d="M4 13m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                    <path d="M14 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                    <path d="M14 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                </svg>
                Dashboard
            </a>
        </li>
    </ul>
</div>
