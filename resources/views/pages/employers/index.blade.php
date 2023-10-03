@extends('layouts.app')
@section('content')
    @include('composables.search')

    <!-- jobs list -->
    <employer-index :categories="{{ $categories }}" />
@endsection
