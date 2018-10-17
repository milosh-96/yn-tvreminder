<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title','Welcome') - {{config('app.name', 'Laravel')}}</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @yield('header_css')
    @if(auth()->check())
    <script>
        window.Laravel = {!! json_encode([
            'user' => Auth::user(),
            'csrfToken' => csrf_token(),
            'vapidPublicKey' => config('webpush.vapid.public_key'),
            'pusher' => [
                'key' => config('broadcasting.connections.pusher.key'),
                'cluster' => config('broadcasting.connections.pusher.options.cluster'),
            ],
        ]) !!};
    </script>
    @endif
</head>
<body id="@yield('body_id','main')">
    
@if((request()->route()->getName() != 'register') and (request()->route()->getName() != 'login'))
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

    <footer class="bg-dark text-white mt-5">
        <div class="container-fluid">
        @if((request()->route()->getName() != 'register') and (request()->route()->getName() != 'login'))
        <div class="row">
            <div class="col-12 col-md-4 py-3">
                <p>
                <img src="{{asset('images/logo.png')}}" height="22px"> is a place where you can create your own TV schedule. You can combine shows, events or movies on TV and get reminded about them.
                    Also, you can add anything as a "show", our platform doesn't force you to follow EPG schedule. <em>You can do anything</em>.
                </p>
            </div>
            </div>
            @endif
            <div class="row">
                <div class="col">
                    <small>{{date("Y")}} - TVReminder. All rights are reserved.</small>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
    <script src="{{asset('js/notif.js')}}"></script>
    @yield('footer_scripts')
</body>
</html>