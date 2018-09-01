    <div class="container pb-5 page pt-3 mt-5">

       <div class="row mt-4">
            <div class="col-12 col-md-3 order-2 order-md-1">
                @yield('left_side')
                @include('user.partials.user-menu')
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
