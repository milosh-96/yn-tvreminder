@extends('layouts.handler')
@section('title','Account Settings: Edit details')
@section('content')
<div class="col-12">
    <h2><i class="fas fa-exclamation-triangle"></i> Account Deletion</h2>
    <strong><em>All Your content will be deleted. This action is irreversible!</em></strong>
    <hr>
    <div class="row">
        <div class="col-12 text-center">
            <h3>Are you sure?</h3>
            <div class="row">
                <div class="col-12 text-center">
                    <form action="{{route('user.account.delete')}}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger">Yes, delete my account</button>
                    </form>
                    <hr>
                    <a href="{{route('index')}}" class="btn btn-lg btn-primary">No, I changed my mind</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection