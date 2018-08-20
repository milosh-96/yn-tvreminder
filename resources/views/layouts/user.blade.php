<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    
    <style>
       
    </style>
</head>
<body>
    <div class="container-fluid mb-2 topbar">
        <div class="row">
            <div class="col-12 text-left">
                <img src="{{asset('images/logo.png')}}" height="30px">
            </div>
        </div>
    </div>
    <div class="container pb-5 page">
        <div class="row header">
            <div class="col-3">
                <div class="user">
                    <div class="d-inline-block">
                        <div class="circle">
                            <i class="fa fa-user"></i>
                        </div>
                    </div>
                    <div class="d-inline-block">Miloš</div>
                </div>
            </div>
            <div class="col-9 header-area">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 col-md-3">
                @include('user.partials.user-menu')
            </div>
            
            <div class="col-12 col-md-7 offset-md-1 mb-5 mb-md-0">
                <div class="row">
                   @yield('content')
                </div>
            </div>
           
        </div>
    </div>
</div>
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        function activateOneTime() {
            $("#date-picker").show();
            $("#days-picker").hide();
        }
        function activateWeekly() {
            $("#date-picker").hide();
            $("#days-picker").show();
        }
    </script>
</body>
</html>