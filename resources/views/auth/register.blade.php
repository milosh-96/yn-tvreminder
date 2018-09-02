@extends('layouts.handler')
@section('body_id','login-register')

@section('content')
<div class="col">
    <h3>Register</h3>
    <form action="{{route('register')}}" method="POST">
        @csrf
        @if($errors->any())
        @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
        @endif
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mt-1">
                    <label for="user_name">User Name</label>
                    <span class="hint">Your unique name, or nick name</span>
                    <input type="text" class="form-control" name="user_name" id="user_name">
                </div>
                <div class="form-group mt-1">
                    <label for="first_name">First Name</label>
                    <span class="hint">Your First name</span>
                    <input type="text" class="form-control" name="first_name" id="first_name">
                </div>
                <div class="form-group mt-1">
                    <label for="last_name">Last Name</label>
                    <span class="hint">Your Last name</span>
                    <input type="text" class="form-control" name="last_name" id="last_name">
                </div>
                <div class="form-group mt-1">
                    <label for="email">E-mail</label>
                    <span class="hint">Your E-mail; Activation Link will be sent here!</span>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mt-1">
                    <label for="password">Password</label>
                    <span class="hint">Use random password. Generate it <a href="#">here</a>.</span>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="form-group mt-1">
                    <label for="password_confirmation">Confirm Password</label>
                    <span class="hint">Retype password</span>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                </div>
                <div class="form-group">
                    <label for="accept_terms">I agree to the <a href="#">Terms Of Services</a></label>
                    <input type="checkbox" name="accept_terms" id="accept_terms">
                </div>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-gradient">Register!</button>
        </div>
    </form>
    </div>

   
@endsection

@section('left_side')
<div class="card mb-3">
    <div class="card-body">
        If you already have an account, <a href="{{route('login')}}">Login Here</a>
    </div>
</div>
@endsection


@section('scripts')

@endsection