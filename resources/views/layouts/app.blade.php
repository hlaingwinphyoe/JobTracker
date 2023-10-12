<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{ asset('logo.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('alert.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
@yield('style')

<body>
    <div id="job-app">
        <div class="min-h-screen bg-gray">
            <!-- Page Navigation -->
            @if (
                !request()->routeIs('employee.login') &&
                    !request()->routeIs('employee.register') &&
                    !request()->routeIs('employer.login'))
                @include('layouts.header')
            @endif
            <!-- Page Content -->
            <main class="mb-4">
                @yield('content')
            </main>

            <!-- Footer Section -->
            @if (
                !request()->routeIs('employee.login') &&
                    !request()->routeIs('employee.register') &&
                    !request()->routeIs('employer.login') &&
                    !request()->routeIs('profile.*'))
                @include('layouts.footer')
            @endif
        </div>
    </div>

    <script src="{{ asset('alert.js') }}"></script>

    @if (session('message'))
        <script type="module">
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-right',
                iconColor: 'white',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'success',
                title: '{{ session('message') }}'
            });
        </script>
    @endif
</body>

</html>
