<div class="card">
    <div class="img" style="max-height:150px;overflow:hidden">
        <img src="{{$show->cover_url ? $show->cover_url : 'https://placeimg.com/640/480/any'}}" alt="" class="card img-top w-100">
    </div>
    <div class="card-body">
        <h5 class="card-title">{{$show->title}}</h5>
        <p>{{$show->description}}</p>

        <div>
            <small><a href="{{route('show.edit',$show->hash)}}">Edit</a></small>
            <small>Delete</small>
        </div>
    </div>
</div>