@extends('layouts.app')

@section('content')
    <section class="px-2 md:px-0" id="">
        <div class="container flex items-center justify-center mx-auto mt-8">
            <div class="flex flex-wrap items-center sm:-mx-3">
                <div class="w-full">
                    <div class="w-full h-auto overflow-hidden rounded-md">
                        <div class="w-full h-auto overflow-hidden rounded-md text-center">
                            <img src="/images/faq.jpg" alt="faq.jpg" class="h-full inline" style="width: 55%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-5xl items-center justify-center mx-auto">
            <div class="flex flex-wrap items-center sm:-mx-3">
                <div class="w-full">
                    <div id="accordion-flush" data-accordion="open" class="border border-gray-200 rounded-xl px-3 py-4" data-active-classes="bg-white dark:bg-gray-900 text-green-600 dark:text-white" data-inactive-classes="text-green-500 dark:text-gray-400">
                        @foreach($faqs as $inde => $faq)
                            <h2 id="accordion-flush-heading-{{ $faq->id }}">
                                <button type="button" data-accordion-target="#accordion-flush-body-{{ $faq->id }}" aria-expanded="false" aria-controls="accordion-flush-body-{{ $faq->id }}" class="flex items-center justify-between w-full py-5 font-medium text-left text-green-500 border-b border-green-200 dark:border-green-700 dark:text-green-400">
                                    <span>{{ $faq->title }}</span>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-flush-body-{{ $faq->id }}" class="hidden" aria-labelledby="accordion-flush-heading-{{ $faq->id }}">
                                <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                                    <p class="mb-2 text-gray-500 dark:text-gray-400">
                                        {!! $faq->desc !!}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection