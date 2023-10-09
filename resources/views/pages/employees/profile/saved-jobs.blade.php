@extends('layouts.app')

@section('content')
    <section class="container mx-auto mt-8">
        <div class="layout">

            @include('pages.employees.profile.navigation')

            <div class="bg-gray-100 rounded-[24px] p-10">
                <h4 class="text-3xl font-bold mb-2">Applications</h4>
                <span class="text-gray-500">Detailed list of your job applications.</span>

            </div>
        </div>
    </section>
@endsection
