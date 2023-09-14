@extends('layouts.app')

@section('content')
    <main class="py-4 overflow-hidden">
        <!-- Hero Section -->
        @include('pages.heroSection')

        <!-- Browse Category Section -->
        @include('pages.browseCategory')

        <!-- Latest Job Section -->
        @include('pages.latestJobs')

        <!-- Footer Section -->
        @include('pages.footer')
    </main>
@endsection
