<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
@yield('style')
<body>
    <div id="job-app">
        <!-- Header Content -->
        @include('layouts.header')

        <!-- Main Content -->
        @yield('content')
    </div>

    {{-- @if (session('logout'))
    <script type="module">
        Swal.fire('{{ session('logout') }}')
    </script>
@endif --}}
</body>

</html>
