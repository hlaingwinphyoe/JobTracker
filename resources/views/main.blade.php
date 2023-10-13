@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    @include('pages.home')

    <!-- Browse Category Section -->
    @include('pages.browse-category')

    <!-- Latest Job Section -->
    @include('pages.latestJobs')

    <!-- Know About User -->
    @if (!Auth::guard('employee')->user())
        <employer></employer>
    @endif
@endsection
