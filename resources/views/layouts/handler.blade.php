<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title',config('app.name', 'Laravel'))</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body id="@yield('body_id','main')">
    
    @if((request()->route()->getName() != 'login' && request()->route()->getName() != 'register'))
    @include('layouts.shared.header-bar')
    @if(session()->has('msg'))
    <div class="container">
        <div class="col-12">
           <div class="alert alert-success alert-dismissible fade show" role="alert">
                {!!session()->get('msg')!!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    @endif
    @if(auth()->check())
    @include('layouts.user')
    @else
    @include('layouts.public')
    @endif
    @else 
    @include('layouts.login-register-layout')
    @endif
    
    <footer>
        <small>{{date("Y")}} - TVReminder. All rights are reserved.</small>
    </footer>
    <script src="{{asset('js/app.js')}}"></script>
    @yield('footer_scripts')
</body>
</html>