@extends('layouts.app')

@section('content')
    <section class="bg-tertiary-100 p-8">
        <div class="container mx-auto py-6">
            <h3 class="text-4xl font-semibold tracking-tight">{{ $jobPost->title }}</h3>

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
                            <a href="{{ route('home.jobs') }}"
                                class="ml-1 text-sm font-medium text-secondary-400 hover:text-primary-500 md:ml-2">Jobs
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
                <img class="rounded-xl w-full" src="https://placehold.co/600x280" alt="" />
                <p class="text-lg text-left text-gray-500 indent-6 leading-8 first-letter:text-2xl">
                    {!! $jobPost->desc !!}
                </p>
                <div class="flex items-center justify-between">
                    @if ($jobPost->status->slug == 'available')
                        <div class="flex items-center">
                            <x-primary-button class="rounded-md mr-3" name="Apply Now" />
                            <x-secondary-button class="rounded-md" name="Save Job" />
                        </div>
                    @endif

                    <a href="#" class="p-2.5 rounded-full bg-gray-100 hover:bg-gray-200 inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-share" width="20"
                            height="20" viewBox="0 0 24 24" stroke-width="1" stroke="#2c3e50" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M6 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                            <path d="M18 6m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                            <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                            <path d="M8.7 10.7l6.6 -3.4" />
                            <path d="M8.7 13.3l6.6 3.4" />
                        </svg>
                    </a>
                </div>
            </div>
            <!-- Business Info-->
            <div class="">
                <div class="bg-white border border-gray-200 shadow-sm p-4 rounded-xl divide-y divide-gray-200 space-y-6">
                    <article class="space-y-4">
                        <div class="flex items-center">
                            <img src="https://placehold.co/40x40" class="rounded-full h-12" alt="">
                            <p class="flex flex-col ml-2">
                                <span>{{ $jobPost->user->name }}</span>
                                <span class="text-xs text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-home-2 inline-flex items-center mb-[3px]"
                                        width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                        <path d="M10 12h4v4h-4z" />
                                    </svg>
                                    {{ $jobPost->user->company_name }}
                                </span>
                            </p>
                        </div>
                        <p>
                            <span class="text-sm">
                                {{ $jobPost->user->desc }}
                            </span>
                        </p>
                        @if ($jobPost->status->slug == 'available')
                            <div class="flex items-center justify-center">
                                <x-primary-button class="rounded-md mr-3" name="Apply Now" />
                                <x-secondary-button class="rounded-md" name="Save" />
                            </div>
                        @endif

                    </article>

                    <article class="pt-6 space-y-4">
                        <p class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-briefcase text-gray-500" width="20" height="20"
                                viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" />
                                <path d="M12 12l0 .01" />
                                <path d="M3 13a20 20 0 0 0 18 0" />
                            </svg>
                            <span class="flex flex-col text-gray-500 ml-1">
                                <span class="font-light text-sm mb-1">Job Type</span>
                                <span
                                    class="text-secondary-500 font-semibold tracking-wide">{{ $jobPost->type->name }}</span>
                            </span>
                        </p>

                        <p class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-location text-gray-500" width="20" height="20"
                                viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
                            </svg>
                            <span class="flex flex-col text-gray-500 ml-1">
                                <span class="font-light text-sm mb-1">Region</span>
                                <span
                                    class="text-secondary-500 font-semibold tracking-wide">{{ $jobPost->region->name }}</span>
                            </span>
                        </p>
                        <p class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-coin text-gray-500" width="20" height="20"
                                viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                <path
                                    d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1" />
                                <path d="M12 7v10" />
                            </svg>
                            <span class="flex flex-col text-gray-500 ml-1">
                                <span class="font-light text-sm mb-1">Salary</span>
                                <span class="text-secondary-500 font-light text-sm tracking-wide">
                                    <span class="font-semibold text-base">{{ $jobPost->salary }} Lakhs</span>/Month
                                </span>
                            </span>
                        </p>
                        <p class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-clock text-gray-500" width="20" height="20"
                                viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                <path d="M12 7v5l3 3" />
                            </svg>
                            <span class="flex flex-col text-gray-500 ml-1">
                                <span class="font-light text-sm mb-1">Date Posted</span>
                                <span
                                    class="text-secondary-500 font-semibold tracking-wide">{{ $jobPost->created_at->diffForHumans() }}</span>
                            </span>
                        </p>

                        <p class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-hierarchy text-gray-500" width="20"
                                height="20" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M5 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M19 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M6.5 17.5l5.5 -4.5l5.5 4.5" />
                                <path d="M12 7l0 6" />
                            </svg>
                            <span class="flex flex-col text-gray-500 ml-1">
                                <span class="font-light text-sm mb-1">Status</span>
                                @if ($jobPost->status->slug == 'closed')
                                    <span
                                        class="text-red-500 font-semibold tracking-wide">{{ $jobPost->status->title }}</span>
                                @else
                                    <span
                                        class="text-primary-500 font-semibold tracking-wide">{{ $jobPost->status->title }}</span>
                                @endif

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
                            <span class="text-gray-500 tracking-wide ml-1">{{ $jobPost->user->phone }}</span>
                        </p>

                        <p class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-mail text-gray-500" width="20" height="20"
                                viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                                <path d="M3 7l9 6l9 -6" />
                            </svg>
                            <span class="text-gray-500 tracking-wide ml-1">{{ $jobPost->user->email }}</span>
                        </p>

                        <p class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-building-community text-gray-500" width="20"
                                height="20" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" />
                                <path d="M13 7l0 .01" />
                                <path d="M17 7l0 .01" />
                                <path d="M17 11l0 .01" />
                                <path d="M17 15l0 .01" />
                            </svg>
                            <span class="text-gray-500 tracking-wide ml-1">{{ $jobPost->user->company_type }}</span>
                        </p>
                    </article>
                </div>
            </div>
        </div>

        <!-- Related Jobs-->
        <div class="h-[2px] bg-gray-300 w-full mt-12 mb-8 relative">
            <h4 class="text-3xl font-semibold tracking-wider absolute -top-5 bg-white pr-4">Related Jobs</h4>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-4">
            @foreach ($relatedJobs as $jobPost)
                <div class="max-w-sm h-[25rem] bg-white border border-gray-200 rounded-lg shadow">
                    <a href="{{ route('jobs.show', $jobPost->slug) }}">
                        <img class="rounded-t-lg" src="https://placehold.co/400x250" alt="" />
                    </a>
                    <div class="p-5">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex gap-1.5 items-center">
                                <a href="{{ route('employers.show', $jobPost->user_id) }}" class="cursor-pointer">
                                    <img class="flex-shrink-0 w-8 h-8 rounded-full" src="https://i.imgur.com/7D7I6dI.png"
                                        alt="" />
                                </a>
                                <div class="flex">
                                    <a href="{{ route('employers.show', $jobPost->user_id) }}"
                                        class="text-sm hover:underline">{{ $jobPost->user->name }}</a>
                                </div>
                            </div>
                            <span>
                                <a href=""
                                    class="bg-tertiary-100 hover:bg-tertiary-200 text-tertiary-800 text-xs font-semibold px-2.5 py-1 rounded border border-tertiary-400 whitespace-nowrap">{{ $jobPost->type->name }}</a>
                            </span>
                        </div>
                        <a href="{{ route('jobs.show', $jobPost->slug) }}">
                            <h5 class="mb-4 text-lg capitalize hover:underline line-clamp-2">
                                {{ $jobPost->title }}
                            </h5>
                        </a>

                        <div class="mb-2 flex justify-between items-center">
                            <span class="text-sm me-3 text-gray-500 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-clock-hour-3 inline-flex items-center mb-[3px]"
                                    width="15" height="15" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                    <path d="M12 12h3.5" />
                                    <path d="M12 7v5" />
                                </svg>
                                {{ $jobPost->created_at->diffForHumans() }}
                            </span>
                            <span class="text-sm text-gray-500 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-location inline-flex items-center mb-[3px]"
                                    width="15" height="15" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
                                </svg>
                                {{ $jobPost->region->name }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between">
                            <h5 class="text-lg text-primary-500 font-semibold">
                                {{ $jobPost->salary }} Lakhs<span class="text-sm text-gray-500 font-light">/Month</span>
                            </h5>
                            <span>
                                <div id="save-tooltip" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-500 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Saved Post
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <a href="javascript:void(0)" data-tooltip-target="save-tooltip">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-heart text-gray-500" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    </svg>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
