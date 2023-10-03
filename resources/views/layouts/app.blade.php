<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
@yield('style')

<body>
    <div id="job-app">
        <div class="min-h-screen bg-gray">
            <!-- Page Navigation -->
            @include('layouts.header')
            <!-- Page Content -->
            <main class="mb-4">
                @yield('content')
            </main>

            <!-- Footer Section -->
            @include('layouts.footer')
        </div>
    </div>

    {{-- @if (session('logout'))
    <script type="module">
        Swal.fire('{{ session('logout') }}')
    </script>
@endif --}}
</body>

</html>
