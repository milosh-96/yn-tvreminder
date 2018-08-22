<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    
</head>
<body>
    <div class="container-fluid mb-2 topbar">
        <div class="row">
            <div class="col-12 text-left">
                <img src="{{asset('images/logo.png')}}" height="30px">
            </div>
        </div>
    </div>
    <div class="container pb-5 page pt-3 mt-5">

       <div class="row mt-4">
            <div class="col-12 col-md-3 order-2 order-md-1">
                @yield('left_side')
            </div>
            
            <div class="col-12 col-md-7 mb-5 mb-md-0 order-1 order-md-2">
                <div class="row">
                    @yield('content')
                </div>
            </div>
            <div class="col-md-2 d-none-d-md-block order-md-3">
                <div class="banner">
                    <a href="https://netflix.com" target="_blank">
                        <img class="w-100" src="http://indiebeatmagazine.com/wp-content/uploads/2015/05/netflix-banner.jpg" alt="Netflix - Join Now">
                    </a>
                </div>
            </div>
            
        </div>
    </div>
    <footer>
        <small>{{date("Y")}} - TVReminder. All rights are reserved.</small>
    </footer>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>