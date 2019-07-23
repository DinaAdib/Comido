<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
     <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <style>

    .main-content{
        background-image: url('http://cheersbar.com.au/wp-content/uploads/2016/01/CheersBar-Food-76.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center; 
        height:100%;
        opacity:0.8;
    }

    .login-form {
        background-color:rgba(0, 0, 0, 0.6);  
        color:white;
        padding:40px  !important ; 
        margin-top:200px !important ; 
        margin-bottom: 200px !important ; 
        padding-bottom: 60px !important ;	
        border-radius: 30px !important ;
        text-align: center !important ;
        
    }
      h1
    {font-family: 'Rubik Mono One', sans-serif;
     text-align: left;}

     .home{
        color:white;
        background-color:rgba(0, 0, 0, 0.6);  
        padding:100px 50px 150px 70px;
        text-align:center;

     }

     .menu{
         color:white;
         height:100%;
        background-color:rgba(0, 0, 0, 0.6);  
     }

     .footer {
        margin-top:100px;
        padding:90px;
        bottom: 0px;
        margin-bottom: 0px; 
        background-color: #eee9e9;
    }


    .logout-link{
        align:right;

    }

    .pickup{
        align:right;
    }

    #item{
        padding:20px;
    }
      </style>
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

        <div class="container">
        @include('layouts.partials.nav')

        <section class="main-content">
        @yield('page-content')
        </section>

        @yield('footer')


        </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>


    <script>


    </script>

</html>