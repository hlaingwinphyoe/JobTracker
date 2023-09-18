@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    @include('pages.heroSection')

    <!-- Browse Category Section -->
    @include('pages.browseCategory')

    <!-- Latest Job Section -->
    @include('pages.latestJobs')

    <!-- Know About User -->
    <employer></employer>

    <!-- Footer Section -->
    @include('pages.footer')
@endsection
