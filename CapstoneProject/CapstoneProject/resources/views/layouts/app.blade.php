<html>
<head>
    
    <!-- Scripts -->
    <script src="{{ asset('assets/js/color-modes.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    
    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;400&family=Poppins&display=swap" rel="stylesheet">

    <style>
        .nav-font{
            font-family: 'Inter', sans-serif;
            color: black;
            font-size: 24x;
            font-weight: 700;
        }

        .navlist-font{
            font-family: 'Poppins', sans-serif;
            color: black;
            font-size: 16px;
            margin-right: 48px;
            font-weight: 400;
        }
        
        .footer-list ul li{
            font-family: 'Poppins', sans-serif;
            color: black;
            font-size: 16px;
            font-weight: 400;
           
        }
        .footer-list h4{
            font-family: 'Inter', sans-serif;
            color: black;
            font-size: 24x;
            font-weight: 700;
            
        }
    </style>
</head>
<body>
    {{-- Header --}}
     @include('layouts.header')
    {{-- !Header --}}
    {{-- Content --}}
    {{-- @yield('content') --}}
    <div class="" style="height: 500px"></div>
    

    {{-- Footer --}}
    @include('layouts.footer')
      
    {{-- !Footer --}}
    <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>