@extends('layouts.handler')
@section('title','Your Library')
@section('content')
<div class="col-12">
    <h3>Your Library</h3>

    <div class="items">
        <div class="row">
          <div class="col-12">
          View as: 
          <a href="#">Cards</a>,
          <a href="#">List</a> or 
          <a href="#">EPG</a>
          <hr>
          </div>
          @foreach($shows as $show)
          <div class="col-12 col-md-4">
            @include('user.library.partials.show-card')
          </div>
          @endforeach
        </div>
    </div>
</div>
@endsection


@section('footer_scripts')
@parent
@endsection