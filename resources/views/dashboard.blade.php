<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Dashboard</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{asset('assets/css/styles.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
</head>
<body>

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        {{-- Sidebar Start --}}
        @include('components.sidebar')
        {{-- Sidebar end --}}

        <div class="body-wrapper">
            @include('components.navbar')

            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/js/bootstrap.bundle.min.js" integrity="sha512-Sct/LCTfkoqr7upmX9VZKEzXuRk5YulFoDTunGapYJdlCwA+Rl4RhgcPCLf7awTNLmIVrszTPNUFu4MSesep5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> --}}
    <script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('assets/js/app.min.js')}}"></script>
    <script src="{{asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/libs/simplebar/dist/simplebar.js')}}"></script>
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
</body>
</html>
