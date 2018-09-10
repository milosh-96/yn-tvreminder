    <div class="container pb-5 page">
        <div class="row header">
            <div class="col-3">
                <div class="user">
                    <div class="d-inline-block">
                        <div class="circle">
                            <i class="fa fa-user"></i>
                        </div>
                    </div>
                    <div class="d-inline-block">@yield('user_title',auth()->user()->name())</div>
                </div>
            </div>
            <div class="col-9 header-area">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 col-md-3 order-2 order-md-1">
                @yield('left_side')
                <hr>
                @include('user.partials.user-menu')
            </div>
            
            <div class="col-12 col-md-9 mb-5 mb-md-0 order-1 order-md-2">
                <div class="row">
                    @yield('content')
                </div>
            </div>
            
        </div>
    </div>
    <footer>
        <small>{{date("Y")}} - TVReminder. All rights are reserved.</small>
    </footer>
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
    @yield('footer_scripts')
    
</body>
</html>