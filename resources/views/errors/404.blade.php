@extends('layouts.handler')
@section('title','404 Error - Page not Found')
@section('header_css')
<style>
.screen-lost-signal {
    display:flex;
    flex-direction:row;
}
.screen-lost-signal .stripe {
    height:400px;
    width:20%;
}
</style>
@endsection
@section('content')
<div class="col-12">
    <h2>404 - Signal Lost!</h2>
    <p>Requested resource hasn't been found.</p>
</div>
@endsection