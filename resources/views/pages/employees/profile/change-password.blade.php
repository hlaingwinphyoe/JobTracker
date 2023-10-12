@extends('layouts.app')

@section('content')
    <section class="container mx-auto mt-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">

            @include('pages.employees.profile.navigation')

            <div class="bg-gray-100 rounded-[24px] p-10 col-span-3 mt-5 lg:mt-0">
                <h4 class="text-3xl font-bold mb-2">Edit Profile</h4>
                <span class="text-gray-500">Update Your Personal Details For Better Job.</span>

                @if ($errors->any())
                    <ul class="mt-1.5 list-disc list-inside p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form action="{{ route('profile.updatePassword') }}" class="mt-5 space-y-4" method="POST">
                    @csrf
                    @method('post')
                    <x-input label="Current Password" name="current_password" type="password" placeholder="Current Password">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-lock-access text-primary-500" width="17" height="17"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 8v-2a2 2 0 0 1 2 -2h2" />
                            <path d="M4 16v2a2 2 0 0 0 2 2h2" />
                            <path d="M16 4h2a2 2 0 0 1 2 2v2" />
                            <path d="M16 20h2a2 2 0 0 0 2 -2v-2" />
                            <path d="M8 11m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v3a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" />
                            <path d="M10 11v-2a2 2 0 1 1 4 0v2" />
                        </svg>
                    </x-input>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <x-input label="New Password" name="new_password" type="password" placeholder="New Password">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-lock-access text-primary-500" width="17"
                                height="17" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 8v-2a2 2 0 0 1 2 -2h2" />
                                <path d="M4 16v2a2 2 0 0 0 2 2h2" />
                                <path d="M16 4h2a2 2 0 0 1 2 2v2" />
                                <path d="M16 20h2a2 2 0 0 0 2 -2v-2" />
                                <path d="M8 11m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v3a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" />
                                <path d="M10 11v-2a2 2 0 1 1 4 0v2" />
                            </svg>
                        </x-input>

                        <x-input label="Confirm New Password" name="new_confirm_password" type="password"
                            placeholder="Confirm Password">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-lock-access text-primary-500" width="17"
                                height="17" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 8v-2a2 2 0 0 1 2 -2h2" />
                                <path d="M4 16v2a2 2 0 0 0 2 2h2" />
                                <path d="M16 4h2a2 2 0 0 1 2 2v2" />
                                <path d="M16 20h2a2 2 0 0 0 2 -2v-2" />
                                <path d="M8 11m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v3a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z" />
                                <path d="M10 11v-2a2 2 0 1 1 4 0v2" />
                            </svg>
                        </x-input>
                    </div>

                    <x-primary-button class="bg-tertiary-500 hover:bg-tertiary-500 focus:ring-tertiary-500 rounded-lg"
                        name="Update" />
                </form>
            </div>

            <!-- Skills & Experience Coming Soon... -->
        </div>
    </section>
@endsection
