@extends('layouts.app')

@section('content')
    <section class="container mx-auto mt-8 space-y-8">
        <div class="block w-full p-6 bg-white border border-gray-200 rounded-lg">
            <h4 class="text-3xl font-semibold">Job's Detail</h4>

            <div class="flex flex-col md:flex-row items-start divide-x-0 md:divide-x-2 divide-y-2 md:divide-y-0 mt-5">
                <article class="w-full md:w-[70%] pb-5 md:pb-0">
                    <h4 class="text-xl">{{ $jobPost->title }}</h4>
                    <p class="mt-2 text-sm flex items-center">
                        <span
                            class="bg-primary-100 text-primary-800 text-sm font-medium inline-flex items-center px-3.5 py-1 rounded-full border border-primary-400">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-triangle-square-circle inline-flex items-center mb-px"
                                width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 3l-4 7h8z" />
                                <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                <path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                            </svg>
                            {{ $jobPost->category->name }}
                        </span>
                        <span class="text-sm ml-3 text-gray-500">
                            Posted on {{ $jobPost->updated_at->format('d M, Y') }}
                        </span>
                    </p>

                    <p class="text-gray-500 line-clamp-2 my-5">
                        {{ $jobPost->desc }}
                    </p>

                    <a href="{{ route('jobs.show', $jobPost->slug) }}" class="underline text-primary-500 hover:text-primary-600">View Job's
                        Post</a>
                </article>

                <div class="w-full md:w-[30%] pl-4 pt-5 md:pt-0">
                    <article class="space-y-4">
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coin text-gray-500"
                                width="20" height="20" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                <path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1" />
                                <path d="M12 7v10" />
                            </svg>
                            <span class="flex flex-col text-gray-500 ml-1">
                                <span class="font-light text-sm mb-1">Salary</span>
                                <span class="text-secondary-500 font-light text-sm tracking-wide">
                                    <span class="font-semibold text-base">{{ $jobPost->salary }} Lakhs</span>/Month
                                </span>
                            </span>
                        </p>
                    </article>
                </div>
            </div>
        </div>

        <div class="block w-full lg:w-2/3 p-6 bg-white border border-gray-200 rounded-lg">
            @php
                $employee = Auth::guard('employee')->user();
            @endphp
            <form action="{{ route('jobPost.apply-submit', ['employee' => $employee->id, 'jobPost' => $jobPost->id]) }}"
                class="space-y-6" id="apply-form" method="POST">
                @csrf
                <div>
                    <label for="cover_letter" class="block mb-2 text-sm font-medium text-gray-900">
                        Cover Letter <span class="text-red-500">*</span>
                    </label>
                    <textarea id="cover_letter" rows="4" name="cover_letter"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500">
                    </textarea>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">
                        Attachment (CV/Resume)
                        <span class="text-red-500">*</span>
                    </label>
                    <label for="attachment"
                        class="flex flex-col items-center justify-center p-4 h-40 border-2 border-gray-200 border-dashed rounded cursor-pointer bg-gray-200 dark:hover:bg-bray-800 hover:bg-gray-300">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500">
                                <span class="font-semibold">Click to upload</span>
                            </p>
                            <p class="text-xs text-gray-500">
                                PDF, PNG, JPG
                            </p>
                        </div>
                        <input id="attachment" name="file" type="file" accept="image/*" class="hidden" />
                    </label>
                </div>
            </form>
        </div>

        <button
            class="bg-primary-500 px-4 py-2.5 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-300 font-medium hover:bg-primary-600"
            form="apply-form">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="icon icon-tabler icon-tabler-device-floppy inline-flex items-center mb-1" width="20"
                height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                <path d="M14 4l0 4l-6 0l0 -4" />
            </svg>
            Submit
        </button>
    </section>
@endsection
