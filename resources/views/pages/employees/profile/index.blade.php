@extends('layouts.app')

@section('content')
    <section class="container mx-auto mt-8">
        <div class="layout">
            
            @include('pages.employees.profile.navigation')

            <div class="bg-gray-100 rounded-[24px] p-10">
                <h4 class="text-3xl font-bold mb-2">Applications</h4>
                <span class="text-gray-500">Detailed list of your job applications.</span>


                <div class="relative overflow-x-auto mt-5">
                    <div class="flex items-center justify-between pb-4">
                        <select id="date" name="date"
                            class="h-auto min-w-md rounded-lg border border-gray-400 bg-transparent p-2 text-gray-500 focus:outline-none focus:ring-0 sm:text-sm">
                            <option value="7days" selected>Last 7 Days</option>
                            <option value="30days">Last 30 Days</option>
                            <option value="7days">Last 7 Days</option>
                        </select>
                        <input type="search" id="default-search"
                            class="block w-64 p-2 text-sm text-gray-900 border border-gray-400 rounded-lg bg-transparent focus:outline-none focus:ring-0"
                            placeholder="Search...">
                    </div>

                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-white">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Product name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Color
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-transparent border-b">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Apple MacBook Pro 17"
                                </th>
                                <td class="px-6 py-4">
                                    Silver
                                </td>
                                <td class="px-6 py-4">
                                    Laptop
                                </td>
                                <td class="px-6 py-4">
                                    $2999
                                </td>
                            </tr>
                            <tr class="bg-transparent border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Microsoft Surface Pro
                                </th>
                                <td class="px-6 py-4">
                                    White
                                </td>
                                <td class="px-6 py-4">
                                    Laptop PC
                                </td>
                                <td class="px-6 py-4">
                                    $1999
                                </td>
                            </tr>
                            <tr class="bg-transparent">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    Magic Mouse 2
                                </th>
                                <td class="px-6 py-4">
                                    Black
                                </td>
                                <td class="px-6 py-4">
                                    Accessories
                                </td>
                                <td class="px-6 py-4">
                                    $99
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </section>
@endsection
