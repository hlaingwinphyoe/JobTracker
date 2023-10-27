@extends('layouts.app')

@section('content')
    <section>
        <div class="flex min-h-screen flex-col justify-center px-6 py-6 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <div class="flex items-center justify-center">
                    <img class="h-16 w-auto" src="{{ asset('logo.png') }}" alt="Company Logo">
                    <h4 class="text-2xl font-bold">{{ config('app.name') }}</h4>
                </div>
                <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign Up
                </h2>
            </div>

            <div class="mt-3 sm:mx-auto sm:w-full sm:max-w-sm">
                @if ($errors->any())
                    <ul class="mt-1.5 list-disc list-inside p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form class="space-y-6" action="{{ route('employee.registerStore') }}" method="POST">
                    @csrf
                    <x-input label="Username" name="name" value="{{ old('name') }}">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-user-square-rounded text-primary-500" width="17"
                            height="17" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6z" />
                            <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z" />
                            <path d="M6 20.05v-.05a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v.05" />
                        </svg>
                    </x-input>

                    <x-input label="Email" name="email" type="email" placeholder="Email" value="{{ old('email') }}">

                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mail text-primary-500"
                            width="17" height="17" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                            <path d="M3 7l9 6l9 -6" />
                        </svg>
                    </x-input>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        <div>
                            <label for="regions" class="block text-sm font-medium leading-6 text-gray-900">Choose
                                Region</label>
                            <div class="mt-2 relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-world text-primary-500" width="17"
                                        height="17" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                        <path d="M3.6 9h16.8" />
                                        <path d="M3.6 15h16.8" />
                                        <path d="M11.5 3a17 17 0 0 0 0 18" />
                                        <path d="M12.5 3a17 17 0 0 1 0 18" />
                                    </svg>
                                </div>
                                <select id="regions" name="region"
                                    class="bg-transparent border text-sm border-gray-400 text-gray-500 rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-9 p-2.5">
                                    <option selected>Choose a country</option>
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->id }}"
                                            {{ old('region') == $region->id ? 'selected' : '' }}>{{ $region->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <x-input label="Phone" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-phone text-primary-500" width="17" height="17"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                            </svg>
                        </x-input>
                    </div>

                    <x-input label="Password" name="password" type="password" placeholder="Password">
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

                    <x-input label="Confirm Password" placeholder="Confirm Password" name="password_confirmation"
                        type="password">
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

                    <div class="flex items-center">
                        <input checked id="checked-checkbox" type="checkbox" value=""
                            class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-400 rounded focus:ring-primary-500 focus:ring-2">
                        <label for="checked-checkbox"
                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Agree to <a
                                href="">Terms & Conditions</a></label>
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-primary-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">Sign
                            Up</button>
                    </div>
                </form>

                <p class="mt-3 text-center text-sm text-gray-500">
                    Already Registerd?
                    <a href="{{ route('employee.login') }}"
                        class="font-semibold leading-6 text-primary-500 hover:text-primary-600">Login Here.</a>
                </p>
            </div>
        </div>
    </section>
@endsection
