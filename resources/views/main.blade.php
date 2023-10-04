@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    @include('pages.home')

    <!-- Browse Category Section -->
    {{-- @include('pages.browseCategory') --}}

    <!-- Latest Job Section -->
    {{-- @include('pages.latestJobs') --}}

    <!-- Know About User -->
    @guest
        <employer></employer>
    @endguest
@endsection
