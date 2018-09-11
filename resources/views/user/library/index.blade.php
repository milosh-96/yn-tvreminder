@extends('layouts.handler')
@section('content')
<div class="col-12">
    <h3>Your Library</h3>

    <div class="items">
        <div class="row">
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