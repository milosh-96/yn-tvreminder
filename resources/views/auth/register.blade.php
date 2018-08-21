@extends('layouts.public')

@section('content')
<div class="col">
    <h3 class="mt-5">Register</h3>
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
@endsection

@section('left_side')
@endsection
