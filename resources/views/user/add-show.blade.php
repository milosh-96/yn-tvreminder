@extends('layouts.handler')
@section('title','Add a new Show')
@section('content')

<div class="col-12">
    <form method="POST">
        @csrf
        <input type="hidden" name="_method" value="{{$formValues->form_method}}">
		<div class="form-check">
			<input type="checkbox" value="1" id="public" @if($formValues->type == "update") {{$show->isPublic() ? 'checked' : ''}} @endif name="public">
			<label for="public">Public?</label>
			<span class="hint">Is the show public?</span>
		</div>
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
                <button class="btn btn-gradient" formaction="{{$formValues->form_route}}" value>Add to Library</button>
                <button class="btn btn-gradient" formaction="{{$formValues->form_route}}?schedule=true" name="submit_type" value="add-schedule">Add and Schedule</button>
            @else
                <button class="btn btn-gradient" formaction="{{$formValues->form_route}}">Update</button>
                <button class="btn btn-gradient" formaction="{{$formValues->form_route}}?schedule=true">Update and Schedule</button>
            @endif
        </div>
        
    </form>
</div>
@endsection

@section('left_side')

<div id="tipsSlider" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#tipsSlider" data-slide-to="0" class="active"></li>
    <li data-target="#tipsSlider" data-slide-to="1"></li>
    <li data-target="#tipsSlider" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <div class="card" style="opacity: 0.5">
    <div class="card-body">
        <h5 class="card-title">Help</h5>
        <p class="card-text">
            <strong>Add To Library</strong>: The show will be added to your library, and you don't have to set reminders. You can do this later.
            <br>
            <strong>Add and Schedule</strong>: The show will be addec to your library, but the second step is scheduling.
        </p>
    </div>
</div>
    </div>

    <div class="carousel-item">
    <div class="card" style="opacity: 0.5">
    <div class="card-body">
        <h5 class="card-title">Tips</h5>
        <p class="card-text">
            You can add anything! It can be series of the shows (two shows in a row on some TV channel), web show (on Netflix, Hulu or You Tube) or anything you like!   
        </p>
    </div>
</div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#tipsSlider" style="color:orange" role="button" data-slide="prev">
    <i class="fas fa-arrow-left"></i> 
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#tipsSlider" style="color:orange" role="button" data-slide="next">
    <i class="fas fa-arrow-right"></i>
    <span class="sr-only">Next</span>
  </a>
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