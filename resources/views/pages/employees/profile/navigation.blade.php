<aside>
    <div class="sticky top-20">
        <div class="mb-5">
            <employer-profile :employee="{{ $user }}" />
        </div>
        <ul>
            <li>
                <a href="{{ route('profile.index') }}"
                    class="{{ request()->routeIs('profile.index') ? 'bg-tertiary-500 text-white hover:text-white' : '' }} flex items-center px-5 py-3 text-gray-900 hover:text-gray-900 rounded-full group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-list"
                        width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                        <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                        <path d="M9 12l.01 0" />
                        <path d="M13 12l2 0" />
                        <path d="M9 16l.01 0" />
                        <path d="M13 16l2 0" />
                    </svg>
                    <span class="ml-3">Your Activity</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile.edit') }}"
                    class="{{ request()->routeIs('profile.edit') ? 'bg-tertiary-500 text-white hover:text-white' : '' }} flex items-center px-5 py-3 text-gray-900 hover:text-tertiary-500 group rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="20"
                        height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                        <path d="M16 5l3 3" />
                    </svg>
                    <span class="ml-3">Edit Profile</span>
                </a>
            </li>

            <li>
                <a href="{{ route('profile.saved') }}"
                    class="{{ request()->routeIs('profile.saved') ? 'bg-tertiary-500 text-white hover:text-white' : '' }} flex items-center px-5 py-3 text-gray-900 hover:text-tertiary-500 group rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="20"
                        height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                    </svg>
                    <span class="ml-3">Saved Jobs</span>
                </a>
            </li>

            <li>
                <a href="{{ route('profile.changePassword') }}"
                    class="{{ request()->routeIs('profile.changePassword') ? 'bg-tertiary-500 text-white hover:text-white' : '' }} flex items-center px-5 py-3 text-gray-900 hover:text-tertiary-500 group rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="20"
                        height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
                        <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                        <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                    </svg>
                    <span class="ml-3">Change Password</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
