<button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
    class="flex mx-3 text-sm rounded-full md:mr-0 focus:ring-2 focus:ring-primary-400" type="button">
    <span class="sr-only">Open user menu</span>
    <img src="https://ui-avatars.com/api/?size=40&rounded=true&name={{ Auth::guard('employee')->user()->name }}"
        alt="profile_img">
</button>

<!-- Dropdown menu -->
<div id="dropdownAvatar" class="z-10 hidden bg-white divide-y divide-gray-200 rounded-lg shadow w-44">
    <div class="px-4 py-3 text-sm text-secondary-500 text-center ">
        <span class="fw-bold text-lg">{{ Auth::guard('employee')->user()->name }}</span>
    </div>
    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownUserAvatarButton">
        <li>
            <a href="{{ route('profile.index') }}" class="block px-4 py-2 hover:bg-gray-100">
                Profile
            </a>
        </li>
    </ul>
    <div class="py-2">
        <!-- Authentication -->
        <form method="POST" action="{{ route('employee.logout') }}">
            @csrf

            <a href="{{ route('employee.logout') }}" class="block px-4 py-2 text-sm text-red-500 hover:bg-gray-100"
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
