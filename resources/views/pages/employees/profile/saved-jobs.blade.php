@extends('layouts.app')

@section('content')
    <section class="container mx-auto mt-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">

            @include('pages.employees.profile.navigation')

            <div class="bg-gray-100 rounded-[24px] p-10 col-span-3 mt-5 lg:mt-0">
                <h4 class="text-3xl font-bold mb-2">Applications</h4>
                <span class="text-gray-500">Detailed list of your job applications.</span>

                <div class="relative overflow-x-auto mt-5">
                    <div class="flex items-center justify-between pb-4">
                        <select id="date" name="date"
                            class="h-auto rounded-lg border border-gray-400 bg-transparent p-2 text-gray-500 focus:outline-none focus:ring-0 sm:text-sm">
                            <option value="7days" selected>Last 7 Days</option>
                            <option value="30days">Last 30 Days</option>
                            <option value="7days">Last 7 Days</option>
                        </select>
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <input type="text" id="simple-search" name="search" value="{{ request()->search }}"
                                    class="bg-transparent border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-0 block w-full p-2"
                                    placeholder="Search...">
                            </div>
                            <button type="submit"
                                class="p-2.5 ml-2 text-sm font-medium text-white bg-tertiary-500 rounded-lg border border-tertiary-500 hover:bg-tertiary-600 focus:outline-none">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </form>
                    </div>

                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-white">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Job Title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Company
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Type
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Created
                                </th>
                                <th scope="col" class="px-8 py-3">
                                    <a href="{{ route('profile.saved') }}"
                                        class="p-1.5 text-sm font-medium text-white bg-tertiary-500 rounded-lg border border-tertiary-500 hover:bg-tertiary-600 focus:outline-none flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh"
                                            width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                                            <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                                        </svg>
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($savedJobs as $job_post)
                                <tr class="bg-transparent border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                                        {{ $job_post->title }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $job_post->user->company_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $job_post->category->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('profile.saved', ['type' => $job_post->type->slug]) }}"
                                            class="bg-tertiary-100 hover:bg-tertiary-200 text-tertiary-800 text-xs font-semibold px-2 py-0.5 rounded border border-tertiary-400 inline-flex items-center justify-center">{{ $job_post->type->name }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $job_post->updated_at->diffForHumans() }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <a href="{{ route('jobs.show', $job_post->slug) }}"
                                                class="bg-[#e6f0f9] p-1 rounded-md hover:bg-tertiary-200 mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-eye" width="18" height="18"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                    <path
                                                        d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                </svg>
                                            </a>
                                            <form
                                                action="{{ route('jobPost.detach', ['employee' => $user->id, 'jobPost' => $job_post->id]) }}">
                                                <button class="bg-red-200 p-1 rounded-md hover:bg-red-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-trash" width="16"
                                                        height="16" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 7l16 0" />
                                                        <path d="M10 11l0 6" />
                                                        <path d="M14 11l0 6" />
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-mood-empty inline-flex items-center mb-1" width="20" height="20"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                            <path d="M9 10l.01 0" />
                                            <path d="M15 10l.01 0" />
                                            <path d="M9 15l6 0" />
                                        </svg>
                                        Nothing yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>
@endsection
