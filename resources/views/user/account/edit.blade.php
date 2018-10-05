@extends('layouts.handler')
@section('title','Account Settings: Edit details')
@section('content')
<div class="col-12">
    <h3>Edit Account Details</h3>
    <div class="form-group">
        <a href="{{route('user.account.confirm-delete')}}" class="btn btn-danger">Delete Account</a>
    </div>
</div>
@endsection