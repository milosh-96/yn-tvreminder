@extends('layouts.public')

@section('content')
<div class="col">
    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        @csrf
        
        <div class="form-group mt-1">
            <label for="user_name">User Name</label>
            <span class="hint">Your User name</span>
            <input type="text" class="form-control" name="user_name" id="user_name">
        </div>
        <div class="form-group mt-1">
            <label for="password">Password</label>
            <span class="hint">Your Password</span>
            <input type="text" class="form-control" name="password" id="password">
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
