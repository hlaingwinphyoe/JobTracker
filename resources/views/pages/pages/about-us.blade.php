@extends('layouts.app')

@section('content')
    <section class="px-2 md:px-0" id="">
        <div class="container flex items-center justify-center mx-auto mt-7 mb-6">
            <div class="w-full md:w-1/2 md:px-3">
                <div class="">
                    <h3 class="text-green-700 text-2xl font-bold text-center underline underline-offset-4 decoration-3 decoration-green-600 dark:decoration-green-800">
                        ABOUT US
                    </h3>
                </div>
            </div>
        </div>
        <div class="container flex items-center justify-center mx-auto">
            <div class="flex flex-wrap flex-col-reverse md:flex-row items-center sm:-mx-3 mb-6">
                <div class="w-full md:w-1/2 md:px-3">
                    <div class="mb-7">
                        <h3 class="text-green-700 text-xl pb-3 font-bold">More about what we do</h3>
                        <p class="pb-2">
                            Featuring the latest news and reviews, we're passionate about supporting young people to have their say. 
                            Voice hosts a wide range of perspectives from the next generation, from writing and videos to photos and podcasts.
                        </p>

                        <p>
                            We also create content for young people doing Trinity College London's arts qualifications and we run 
                            <span class="font-bold">Arts Award on Voice for young people working through Arts Award</span>
                            , offering you ideas and support to complete your award - good luck! 
                        </p>
                    </div>
                    <div class="mb-7">
                        <h3 class="text-green-700 text-xl pb-3 font-bold">Our Mission</h3>
                        <p>
                            Our aim is to bring you contemporary, thoughtful and provocative pieces for young people aged 16-30. 
                            We believe arts, culture, politics and tech are all interconnected, and we explore those connections through interviews, features and comment pieces. 
                            Our team interview leading cultural players such as 
                            <span class="font-bold">choreographer Akram Khan, comedian and actor Dane Baptiste, singer-songwriter Lucy Spraggan, comedian Tim Vine, Ed Sheeran's vocal coach Georgia Train, </span>
                            and flagship cultural institutions such as the BBC and the Crafts Council.
                        </p>
                    </div>
                    <div class="mb-7">
                        <h3 class="text-green-700 text-xl pb-3 font-bold">Our Vision</h3>
                        <p class="pb-2">
                            <span class="font-bold">Voice is a growing magazine with an average 30,000+ visits a month, </span>
                            and a large active pool of young people sharing their opinions. 
                            We run 
                            <span class="font-bold">creative callouts, writing competitions, photography briefs and other opportunities, </span>
                            such as Hello Yellow 
                            <span class="font-bold">('What makes you happy?')</span>
                             in partnership with the charity Young Minds.
                        </p>
                        <p>
                            Thank you to our parent charity 
                            <span class="font-bold">Upstart Projects</span>
                             which supports young people to enjoy the arts and become the creative professionals of the future.
                        </p>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <div class="w-full h-auto overflow-hidden rounded-md">
                        <img src="/images/about-us-1.png" alt="about-us-1.png" class="h-full">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
