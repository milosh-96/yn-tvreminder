<ul class="list-group">
    @if(auth()->user())
    <li class="list-group-item section-title">General</li>
    <li class="list-group-item"><a href="#"><span class="fa fa-user icon"></span> Home</a></li>
    <li class="list-group-item section-title">User Actions</li>
    <li class="list-group-item"><a href="#"><span class="fa fa-plus icon icon"></span> Add New Show</a></li>
    <li class="list-group-item"><a href="#"><span class="fa fa-list icon icon"></span> List All</a></li>
    <li class="list-group-item"><a href="#"><span class="fa fa-question icon icon"></span> Help</a></li>
    <li class="list-group-item section-title">Suggestions</li>
    <li class="list-group-item"><i class="fa fa-star"></i> Most Popular Shows</li>
    <li class="list-group-item section-title">User Settings</li>
    <li class="list-group-item">
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button class="btn btn-xs btn-gradient">Logout</button>
        </form>
    </li>
    @else
    @if(request()->route()->getName() != 'login')<li class="list-group-item"><a href="{{route('login')}}">Login</a></li>@endif
    @if(request()->route()->getName() != 'register')<li class="list-group-item"><a href="{{route('register')}}">Register</a></li>@endif
    @endif
    </ul>