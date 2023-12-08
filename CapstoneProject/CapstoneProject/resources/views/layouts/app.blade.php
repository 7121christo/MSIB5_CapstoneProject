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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- slick --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/regular.min.css') }}">
    
    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;400;500;700&family=Montserrat:wght@400;600&family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    {{-- Midtrans --}}
     <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
  <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
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
            margin: 400px 0 300px 0;
            padding: 50px -200px 0px -200px;
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

        .shop h1{
            font-family: 'Inter', sans-serif;
            color: black;
            font-size: 36px;
            font-weight: 700;
            margin: 100px 0 30px 30px;
            
        }

        .shop p {
            font-family: 'Poppins', sans-serif;
            color: black;
            font-size: 16px;
            font-weight: 400;
            
            
        }

        .shop button
        {
            font-family: 'Poppins', sans-serif;
            color: white;
            font-size: 16px;
            font-weight: 400;
            
            
        }

        .shop-detail .head{
            font-family: 'Inter', sans-serif;
            color: black;
            font-size: 36px;
            font-weight: 700;
            margin: 100px 0 100px 30px;
            
        }

        .billing h1{
            font-family: 'Inter', sans-serif;
            color: black;
            font-size: 36px;
            font-weight: 500;
            margin: 100px 0 50px 0;
            
        }

        .billing .lis{
            font-family: 'Inter', sans-serif;
            color: black;
            font-size: 20px;
            font-weight: 500;
            margin: 5px;
            
        }

        .billing h5{
            font-family: 'Inter', sans-serif;
            color: black;
            font-size: 28px;
            font-weight: 500;
    
            
        }

        .items{
        width:90%;
        margin:0px auto;
        margin-top: 100px;
        }
        .slick-slide{
        margin:10px;
        }
        .slick-slide img{
        width:100%;
        height: 300;
        border: 0px solid #fff;
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

    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script>
        $('.items').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 200,
            });
    </script>

    

    
</body>
</html>