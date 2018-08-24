@extends('layouts.public')

@section('content')
<div class="col">
    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        @csrf
        
        <div class="form-group mt-1">
            <label for="user_name">User Name</label>
            <span class="hint">Your User name</span>
            <input type="text" class="form-control" name="user_name" id="user_name" value="{{old('user_name')}}">
        </div>
        <div class="form-group mt-1">
            <label for="password">Password</label>
            <span class="hint">Your Password</span>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="form-group">
            <label for="remember">Remember me</label>
            <span class="hint">Do you want to remain logged in after you close the browser?</span>
            <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
        </div>
        <div class="form-group">
                <button type="submit" class="btn btn-gradient">
                    {{ __('Login') }}
                </button>
                <hr>
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
        </div>
    </form>
</div>

@endsection
