<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <!-- Scripts -->
    {{-- <script src="{{ asset('assets/js/color-modes.js') }}"></script> --}}

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    
    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;400;500;700&family=Montserrat:wght@400;600&family=Poppins:wght@400;700&display=swap" rel="stylesheet">

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
        
        .jumbo{
            margin: 250px 0 300px 0;
        }
        .jumbo h1{
            
            font-family: 'Poppins', sans-serif;
            color: black;
            font-size: 64px;
            font-weight: 700;
            line-height: 96px;
            
        }
        .jumbo p{
            margin-top: 0;
            font-family: 'Montserrat', sans-serif;
            color: black;
            font-size: 20px;
            font-weight: 400;
            line-height: 24.38px;
            
        }

        .jumbo a button{
            font-family: 'Montserrat', sans-serif;
            color: white;
            font-size: 36px;
            font-weight: 600;
            
        }
        .collection{
            margin: 600px 0 300px 0;
        }
        .collection h1{
            
            font-family: 'Montserrat', sans-serif;
            color: black;
            font-size: 36px;
            font-weight: 600;
            line-height: 24.38px;
            margin-bottom: 40px;
            
        }

        .collection-product{
            height: 473px;
            width: 293px;
            background-color: lightgray;
            border-radius: 15px;
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
        
        .register h1{
            font-family: 'Inter', sans-serif;
            color: black;
            font-size: 36x;
            font-weight: 500;
        }

        .form-control{
            font-family: 'Poppins', sans-serif;
            color: black;
            font-size: 16px;
            font-weight: 400;
        }

        .form-label{
            font-family: 'Poppins', sans-serif;
            color: black;
            font-size: 16px;
            font-weight: 400;
        }
        .form-button{
            font-family: 'Poppins', sans-serif;
            color: black;
            font-size: 16px;
            font-weight: 500;
        }

        .content{
            background-color: gray;
            size: 100%;
        }
        @media (min-width: 576px) { 
            .register{
            margin: 50px 0 0 100px;
        }
         }

    </style>
</head>
<body>
    {{-- Header --}}
     @include('layouts.header')
    {{-- !Header --}}
    {{-- Content --}}
    @yield('content')
    {{-- <div class="" style="height: 500px"></div> --}}
    

    {{-- Footer --}}
    @include('layouts.footer')
      
    {{-- !Footer --}}
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>

    

    
</body>
</html>