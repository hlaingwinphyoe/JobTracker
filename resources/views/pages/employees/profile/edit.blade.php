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
                
                <form action="{{ route('profile.changeInfo') }}" class="mt-5 space-y-4" method="POST">
                    @csrf
                    @method('patch')
                    <x-input class="focus:ring-tertiary-500 focus:border-tertiary-500" label="Name" name="name"
                        value="{{ $user->name }}">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-user-square-rounded text-tertiary-500" width="17"
                            height="17" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6z" />
                            <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                            <path d="M6 20.05v-.05a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v.05" />
                        </svg>
                    </x-input>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <x-input class="focus:ring-tetiary-500 focus:border-tetiary-500" label="Email" name="email"
                            value="{{ $user->email }}">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-user-square-rounded text-tertiary-500" width="17"
                                height="17" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6z" />
                                <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                                <path d="M6 20.05v-.05a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v.05" />
                            </svg>
                        </x-input>

                        <x-input class="focus:ring-tertiary-500 focus:border-tertiary-500" label="Phone" name="phone"
                            value="{{ $user->phone }}">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-user-square-rounded text-tertiary-500" width="17"
                                height="17" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6z" />
                                <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                                <path d="M6 20.05v-.05a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v.05" />
                            </svg>
                        </x-input>
                    </div>

                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                    <textarea id="description" name="desc" rows="10"
                        class="block p-2.5 w-full text-sm text-gray-500 bg-transparent rounded-lg border border-gray-400 focus:ring-tertiary-500 focus:border-tertiary-500"
                        placeholder="Write more about you...">{{ $user->desc }}</textarea>

                    <x-primary-button class="bg-tertiary-500 hover:bg-tertiary-500 focus:ring-tertiary-500 rounded-lg"
                        name="Save Profile" />
                </form>
            </div>

            <!-- Skills & Experience Coming Soon... -->
        </div>
    </section>
@endsection
