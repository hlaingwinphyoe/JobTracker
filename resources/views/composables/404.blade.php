@extends('layouts.app')

@section('content')
    <section class="container mx-auto mt-8">
        <img src="{{ asset('images/404.jpg') }}" class="max-w-md mx-auto" alt="">


        <form class="flex items-center justify-center mt-5 mb-8" action="{{ route('jobs.index') }}">
            <div class="relative w-96">
                <input type="text" id="voice-search" name="search"
                    class="bg-transparent border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5"
                    placeholder="Search Jobs...">
            </div>
            <button type="submit"
                class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white bg-primary-500 rounded-lg border border-primary-500 hover:bg-primary-600 focus:ring-4 focus:outline-none focus:ring-primary-300">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </button>
        </form>

        <div class="text-center mb-8">
            <a href="{{ route('home.index') }}" class="py-2.5 px-3 text-sm border border-primary-500 hover:bg-primary-500 hover:text-white rounded-md">
                Go Back Home
            </a>
        </div>

    </section>
@endsection
