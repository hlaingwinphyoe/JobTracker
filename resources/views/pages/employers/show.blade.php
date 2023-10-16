@extends('layouts.app')

@section('content')
    <section class="bg-tertiary-100 p-8">
        <div class="container mx-auto py-6 flex justify-between items-center">
            <div class="flex items-center">
                <img class="rounded-full h-32 w-32 mr-5 border-2 border-tertiary-500 p-1"
                    src="{{ isset(Auth::user()->profile) ? asset('storage/profile/' . Auth::user()->profile) : asset('user.png') }}"
                    alt="" />
                <div>
                    <h3 class="text-4xl font-semibold tracking-tight">{{ $employer->name }}</h3>
                    <p class="my-3">
                        <span class="text-sm text-gray-500 mr-5">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-location inline-flex items-center mb-[3px]"
                                width="17" height="17" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
                            </svg>
                            {{ $employer->region->name }}
                        </span>
                        <span class="text-sm text-gray-500 mr-5">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-building-community inline-flex items-center mb-[3px]"
                                width="18" height="18" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" />
                                <path d="M13 7l0 .01" />
                                <path d="M17 7l0 .01" />
                                <path d="M17 11l0 .01" />
                                <path d="M17 15l0 .01" />
                            </svg>
                            {{ $employer->company_type }}
                        </span>
                        <span class="text-sm text-gray-500 mr-5">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-clock inline-flex items-center mb-[3px]" width="20"
                                height="20" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                <path d="M12 7v5l3 3" />
                            </svg>
                            {{ $employer->created_at->diffForHumans() }}
                        </span>
                    </p>
                    <span class="bg-tertiary-200 py-2 px-4 rounded-full text-sm text-gray-500 cursor-pointer">
                        {{ $openJobTotal }} Open Jobs
                    </span>
                </div>
            </div>
            <nav class="flex mt-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home.index') }}"
                            class="inline-flex items-center text-sm font-medium text-secondary-700 hover:text-green-500">
                            <svg class="w-3 h-3 mb-[3px] mr-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="{{ route('employers.index') }}"
                                class="ml-1 text-sm font-medium text-secondary-400 hover:text-primary-500 md:ml-2">Employers
                                List</a>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="container mx-auto my-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-10">
            <div class="col-span-2 space-y-8">
                <article>
                    <h4 class="text-3xl font-semibold mb-4">About Company</h4>
                    <p class="text-lg text-left text-gray-500 indent-6 leading-8 first-letter:text-2xl">
                        {{ $employer->desc }}
                    </p>
                </article>

                <article>
                    <h4 class="text-3xl font-semibold mb-4">Gallery</h4>
                    <div class="grid grid-rows-2 grid-cols-2 md:grid-cols-3 grid-flow-row gap-4">
                        <div>
                            <img class="h-auto max-w-full rounded-xl" src="{{ asset('images/gallery3.jpg') }}"
                                alt="">
                        </div>
                        <div class="row-span-2">
                            <img class="h-auto max-w-full rounded-xl" src="{{ asset('images/gallery5.jpg') }}"
                                alt="">
                        </div>
                        <div>
                            <img class="h-auto max-w-full rounded-xl" src="{{ asset('images/gallery2.jpg') }}"
                                alt="">
                        </div>
                        <div>
                            <img class="h-auto max-w-full rounded-xl" src="{{ asset('images/gallery4.jpg') }}"
                                alt="">
                        </div>
                        <div class="row-span-2">
                            <img class="h-auto lg:h-[30rem] object-cover max-w-full rounded-xl"
                                src="{{ asset('images/gallery.jpg') }}" alt="">
                        </div>
                        <div class="col-span-2">
                            <img class="h-auto max-w-full rounded-xl" src="{{ asset('images/gallery6.jpg') }}"
                                alt="">
                        </div>
                    </div>
                </article>
            </div>
            <div class="space-y-6">
                <div class="bg-white border border-gray-200 shadow-sm p-4 rounded-xl divide-y divide-gray-200 space-y-6">
                    <h4 class="text-xl font-bold">Overview</h4>
                    <article class="pt-6 space-y-4">
                        <p class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-building-community text-gray-500" width="16"
                                height="16" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" />
                                <path d="M13 7l0 .01" />
                                <path d="M17 7l0 .01" />
                                <path d="M17 11l0 .01" />
                                <path d="M17 15l0 .01" />
                            </svg>
                            <span class="flex flex-col text-gray-500 ml-1">
                                <span class="font-light text-sm mb-1">Industry</span>
                                <span
                                    class="text-secondary-500 font-semibold tracking-wide">{{ $employer->company_type }}</span>
                            </span>
                        </p>

                        <p class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-location text-gray-500" width="16" height="16"
                                viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
                            </svg>
                            <span class="flex flex-col text-gray-500 ml-1">
                                <span class="font-light text-sm mb-1">Region</span>
                                <span
                                    class="text-secondary-500 font-semibold tracking-wide">{{ $employer->region->name }}</span>
                            </span>
                        </p>
                    </article>

                    <article class="pt-6 space-y-4">
                        <h3 class="font-bold">Contact Info:</h3>
                        <p class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-headset text-gray-500" width="20" height="20"
                                viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 14v-3a8 8 0 1 1 16 0v3" />
                                <path d="M18 19c0 1.657 -2.686 3 -6 3" />
                                <path d="M4 14a2 2 0 0 1 2 -2h1a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-1a2 2 0 0 1 -2 -2v-3z" />
                                <path d="M15 14a2 2 0 0 1 2 -2h1a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-1a2 2 0 0 1 -2 -2v-3z" />
                            </svg>
                            <span class="text-gray-500 tracking-wide ml-1">{{ $employer->phone }}</span>
                        </p>

                        <p class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-mail text-gray-500" width="20" height="20"
                                viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                                <path d="M3 7l9 6l9 -6" />
                            </svg>
                            <span class="text-gray-500 tracking-wide ml-1">{{ $employer->email }}</span>
                        </p>
                    </article>
                </div>

                <div class="bg-white border border-gray-200 shadow-sm p-5 rounded-xl divide-y divide-gray-200 space-y-6">
                    <article class="space-y-4">
                        <div class="flex flex-wrap items-center gap-4">
                            @foreach ($categories as $category)
                                <a href="{{ route('jobs.index', ['category' => $category->slug]) }}"
                                    class="text-tertiary-700 bg-tertiary-100 hover:bg-tertiary-200 focus:ring-4 focus:outline-none focus:ring-tertiary-300 font-medium rounded-full text-sm px-5 py-1.5 text-center">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                    </article>
                </div>
            </div>
        </div>

        <article>
            <div class="h-[2px] bg-gray-300 w-full mt-12 mb-8 relative">
                <h4 class="text-3xl font-semibold tracking-wider absolute -top-5 bg-white pr-4">Opening Jobs</h4>
            </div>
            <employer-job-card :employer="{{ $employer }}" />
        </article>
    </section>
@endsection
