@extends('layouts.app')
@section('content')
    @include('composables.search')

    <!-- jobs list -->
    <job-index :categories="{{ $categories }}" />
@endsection
