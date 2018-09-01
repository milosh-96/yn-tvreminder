<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
@if((request()->route()->getName() != 'login' && request()->route()->getName() != 'register'))
@include('layouts.shared.header-bar')
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
    @yield('scripts')
</body>
</html>