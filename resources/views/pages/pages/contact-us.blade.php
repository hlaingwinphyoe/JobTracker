@extends('layouts.app')

@section('content')
    <section class="px-2 md:px-0" id="">
        <div class="container flex items-center justify-center mx-auto">
            <div class="flex flex-wrap flex-col-reverse md:flex-row items-center sm:-mx-3 mb-6 mt-9">
                <div class="w-full md:w-2/5 ml-auto">
                    <div class="text-center">
                        <h3 class="text-green-700 text-6xl font-bold">Contacts</h3>
                    </div>
                    <div class="w-full h-auto overflow-hidden rounded-md">
                        <img src="/images/contact-us-3.jpg" alt="contact-us-page.png" class="">
                    </div>
                </div>
                <div class="w-full md:w-2/5 md:px-3 mx-auto">
                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0 p-3 bg-custom-yellow rounded-lg">
                                        <span class="text-gray-50">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path clip-rule="evenodd" fill-rule="evenodd" d="M9.69 18.933l.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 00.281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 103 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 002.273 1.765 11.842 11.842 0 00.976.544l.062.029.018.008.006.003zM10 11.25a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5z"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-xl font-medium text-gray-900 truncate dark:text-white">
                                            Address
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            No(112), Zalattwar Street, Between(60*61)Street, Mandalay, Myanmar
                                        </p>
                                    </div>
                                </div>
                            </li>

                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0 p-3 bg-custom-green rounded-lg">
                                        <span class="text-gray-50">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 013.5 2h1.148a1.5 1.5 0 011.465 1.175l.716 3.223a1.5 1.5 0 01-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 006.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 011.767-1.052l3.223.716A1.5 1.5 0 0118 15.352V16.5a1.5 1.5 0 01-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 012.43 8.326 13.019 13.019 0 012 5V3.5z"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-xl font-medium text-gray-900 truncate dark:text-white">
                                            Number
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            +959 978 849 231
                                        </p>
                                    </div>
                                </div>
                            </li>

                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0 p-3 bg-custom-red rounded-lg">
                                        <span class="text-gray-50">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z"></path>
                                                <path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-xl font-medium text-gray-900 truncate dark:text-white">
                                            E-mail
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            jobseekeradmin@gmail.com
                                        </p>
                                    </div>
                                </div>
                            </li>

                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0 p-3 bg-custom-blue rounded-lg">
                                        <span class="text-gray-50">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13a.75.75 0 00-1.5 0v5c0 .414.336.75.75.75h4a.75.75 0 000-1.5h-3.25V5z"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-xl font-medium text-gray-900 truncate dark:text-white">
                                            Opening Hours
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            Monday to Friday (9am - 6pm)
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
