<div class="modal" tabindex="-1" role="dialog" id="reminderModal-{{$show->hash}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reminders for {{$show->title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <ul class="list-group">
                    @foreach($show->reminders as $reminder)
                    <li class="list-group-item">
                       <div class="row">
                       <div class="col-10">
                        {{$reminder->display()}}
                        </div>
                        <div class="col-2 text-right">
                            <a href="{{route('reminder.edit',[$show->hash,$reminder->hash])}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{route('reminder.edit',[$show->hash,$reminder->hash])}}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                       </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <a href="{{route('reminder.create',$show->hash)}}" class="btn btn-sm btn-primary">Add New Reminder</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>