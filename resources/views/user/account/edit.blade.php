@extends('layouts.handler')
@section('title','Account Settings: Edit details')
@section('content')
<div class="col-12">
    <h3>Edit Account Details</h3>
    <div class="form-group">
        <a href="{{route('user.account.confirm-delete')}}" class="btn btn-danger">Delete Account</a>
    </div>

    <div class="form-group">
        Your Timezone: <select name="" id="">
            @foreach(\DateTimeZone::listIdentifiers(DateTimeZone::ALL) as $tz)
            <option value="{{$tz}}" {{(auth()->user()->timezone == $tz) ? 'selected' : ''}}>{{$tz}}</option>
            @endforeach
        </select>
    </div>
</div>
@endsection