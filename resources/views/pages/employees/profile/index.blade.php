@extends('layouts.app')

@section('content')
    <section class="container mx-auto mt-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">

            @include('pages.employees.profile.navigation')

            <div class="bg-gray-100 rounded-[24px] p-10 col-span-3 mt-5 lg:mt-0">
                <h4 class="text-3xl font-bold mb-2">Applications</h4>
                <span class="text-gray-500">Detailed list of your job applications.</span>


                <div class="relative mt-5" id="scrollbar">
                    <form class="flex items-center justify-end pb-4">
                        <div class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <input type="search" id="default-search" name="search" value="{{ request()->search }}"
                                class="block w-64 p-2 text-sm text-gray-900 border border-gray-400 rounded-lg bg-transparent focus:outline-none focus:ring-0"
                                placeholder="Search...">
                            <button type="submit"
                                class="p-2.5 ml-2 text-sm font-medium text-white bg-tertiary-500 rounded-lg border border-tertiary-500 hover:bg-tertiary-600 focus:outline-none">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </div>
                    </form>

                    <div class="overflow-x-auto">
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
                                    <th scope="col" class="px-6 py-3">
                                        Submitted
                                    </th>
                                    <th scope="col" class="px-8 py-3">
                                        <a href="{{ route('profile.index') }}"
                                            class="p-1.5 text-sm font-medium text-white bg-tertiary-500 rounded-lg border border-tertiary-500 hover:bg-tertiary-600 focus:outline-none flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-refresh" width="20" height="20"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                                                <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                                            </svg>
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($appliedJobs as $appliedJob)
                                    <tr class="bg-transparent last:border-b-0 border-b">
                                        <th scope="row" class="px-6 py-4 font-semibold text-gray-900">
                                            <p class="mb-1">
                                                {{ $appliedJob->job_post->title }}
                                            </p>
                                            <small class="text-gray-500 whitespace-nowrap">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor"
                                                    class="w-4 h-4 inline-flex items-center mb-1">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 01-1.161.886l-.143.048a1.107 1.107 0 00-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 01-1.652.928l-.679-.906a1.125 1.125 0 00-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 00-8.862 12.872M12.75 3.031a9 9 0 016.69 14.036m0 0l-.177-.529A2.25 2.25 0 0017.128 15H16.5l-.324-.324a1.453 1.453 0 00-2.328.377l-.036.073a1.586 1.586 0 01-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 01-5.276 3.67m0 0a9 9 0 01-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                                                </svg>
                                                {{ $appliedJob->job_post->region->name }}
                                            </small>
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $appliedJob->job_post->user->company_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $appliedJob->job_post->category->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('profile.saved', ['type' => $appliedJob->job_post->type->slug]) }}"
                                                class="bg-tertiary-100 hover:bg-tertiary-200 text-tertiary-800 text-xs font-semibold px-2 py-0.5 rounded border border-tertiary-400 inline-flex items-center justify-center">{{ $appliedJob->job_post->type->name }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $appliedJob->job_post->updated_at->diffForHumans() }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $appliedJob->updated_at->diffForHumans() }}
                                        </td>
                                        <td class="px-8 py-4">
                                            <a href="{{ route('jobs.show', $appliedJob->job_post->slug) }}"
                                                class="bg-[#e6f0f9] p-1 rounded-md hover:bg-tertiary-200 mr-2 block">
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
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-transparent">
                                        <td colspan="7" class="px-6 py-4 text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-mood-empty inline-flex items-center mb-1"
                                                width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
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
                    <div class="paginate">
                        {{ $appliedJobs->appends(request()->query->all())->links('composables.pagination') }}
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
