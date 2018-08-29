@extends('layouts.user')
@section('content')

<div class="col-12">
    <form action="{{route('show.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title"><i class="fa fa-font"></i>Title</label>
            <span class="hint">You can type anything that will help you to remember this show</span>
            <input id="title" name="title" type="text" class="form-control form-control-lg"> 
        </div>
        <div class="form-group">
            <label for="description"><i class="fa fa-comment"></i> Description</label>
            <span class="hint">How would you describe this show? Be descriptive, or ignore this field :)</span>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-gradient">Add to Library</button>
            <button class="btn btn-gradient">Add and Schedule</button>
        </div>
        
    </form>
</div>
@endsection

@section('left_side')
<div class="card" style="opacity: 0.5">
    <div class="card-body">
        <h5 class="card-title">Tips</h5>
        <p class="card-text">You should add a reminder offset. If you don't set it, you will be reminded at the time when the show begins. You could miss first minutes of the show.</p>
    </div>
</div>

@endsection