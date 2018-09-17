<div class="card">
    <div class="img" style="max-height:150px;overflow:hidden">
        <img src="{{$show->cover_url ? $show->cover_url : 'https://placeimg.com/640/480/any'}}" alt="" class="card img-top w-100">
    </div>
    <div class="card-body">
        <a href="{{route('show.view',$show->hash)}}"><h5 class="card-title">{{$show->title}}</h5></a>
        <p>{{$show->description}}</p>

        <div class="row">
           <div class="col-6">
            <small><a href="{{route('show.edit',$show->hash)}}">Edit</a></small>
                <small>
                    <form action="{{route('show.delete',$show->hash)}}" method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="link" onclick="tvReminder.globalActions.confirmDelete(event)">Delete</button>
                    </form>

                </small>
            </div>
            <div class="col-6 text-right">
                @if($show->hasReminders())
                @include('reminders.remindersListModal')
                <a href="#" data-toggle="modal" data-target="#reminderModal-{{$show->hash}}"><i class="fa fa-check"></i> <small>Scheduled</small></a>

                @else
                <a href="{{route('reminder.create',$show->hash)}}"><i class="fa fa-clock"></i> Schedule</a>
                @endif
            </div>
        </div>
    </div>
</div>