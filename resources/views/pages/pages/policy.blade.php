@extends('layouts.app')

@section('content')
    <section class="px-2 md:px-0" id="">
        <div class="container flex items-center justify-center mx-auto">
            <div class="flex flex-wrap items-center sm:-mx-3">
                <div class="w-full">
                    <div class="w-full h-auto overflow-hidden rounded-md">
                        <div class="px-5 py-7 w-full h-auto overflow-hidden rounded-md text-center " 
                        style="background: linear-gradient(to right, rgb(39 162 111 / 7%), rgb(59 130 246 / 14%));"
                        >
                            <h5 class="text-3xl mb-4 font-bold gradient-text">
                                {{ $policy->title }}
                            </h5>
                            <p>{!! $policy->desc !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection