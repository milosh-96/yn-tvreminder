@extends('layouts.handler')
@section('content')

<div class="col-12">
    <form action="{{$formValues->form_route}}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="{{$formValues->form_method}}">
        <div class="form-group">
            <label for="title"><i class="fa fa-font"></i>Title</label>
            <span class="hint">You can type anything that will help you to remember this show</span>
            <input id="title" name="title" type="text" class="form-control form-control-lg" value="{{$formValues->type == 'update' ? $show->title : old('title')}}"> 
        </div>
        <div class="form-group">
            <label for="description"><i class="fa fa-comment"></i> Description</label>
            <span class="hint">How would you describe this show? Be descriptive, or ignore this field :)</span>
            <textarea name="description" id="description" class="form-control">{{$formValues->type == 'update' ? $show->description : old('description')}}</textarea>
        </div>
        <div class="form-group">
            <label for="cover_url"><i class="fa fa-image"></i> Cover</label>
            <span class="hint">Enter a URL of cover picture</span>
            <input id="cover_url" name="cover_url" type="text" autocomplete="off" class="form-control form-control-sm" value="{{$formValues->type == 'update' ? $show->cover_url : old('cover_url')}}"> 

            <div id="image_preview" class="mt-4">
                <img id="image" width="250px" />
            </div>
        </div>
        <div class="form-group">
            @if($formValues->type == "create")
                <button class="btn btn-gradient">Add to Library</button>
                <button class="btn btn-gradient">Add and Schedule</button>
            @else
                <button class="btn btn-gradient">Update</button>
                <button class="btn btn-gradient">Update and Schedule</button>
            @endif
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

@section('footer_scripts')
    @parent
    @if(($formValues->type == "update" && isset($show->cover_url) && $show->cover_url != NULL)) 
    <script>
       $("#image_preview").children("#image").attr("src",$("#cover_url").val());
    </script>
    @endif
    <script>
        $("#cover_url").change(function() {
            $("#image_preview").children("#image").attr("src",$(this).val());
        });
    </script>

 
@endsection