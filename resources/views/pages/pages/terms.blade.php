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
                        {{-- background: linear-gradient(to right, rgb(39 162 111 / 64%), rgb(59 130 246 / 66%)) --}}
                        {{-- linear-gradient(to bottom, #27A26F, #3b82f6); --}}
                        {{-- linear-gradient(rgb(39 162 111 / 7%), rgb(59 130 246 / 14%)); --}}
                            <h5 class="text-3xl mb-4 font-bold gradient-text">
                            {{-- background: -webkit-linear-gradient(#27A26F, #3b82f6);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent; --}}
                                {{ $terms->title }}
                            </h5>
                            {{-- <div class="mt-2 h-2 w-60 rounded-full bg-gradient-to-r from-primary-500 via-primary-400 to-tertiary-500"></div> --}}
                            <p>{!! $terms->desc !!}</p>
                            {{-- <img src="/images/faq.jpg" alt="faq.jpg" class="h-full inline" style="width: 55%;"> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection