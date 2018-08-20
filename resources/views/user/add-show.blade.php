@extends('layouts.user')
@section('content')

<div class="col-12">
    <form action="">
        <div class="form-group">
            <label for="title"><i class="fa fa-font"></i>Title</label>
            <span class="hint">You can type anything that will help you to remember this show</span>
            <input id="title" type="text" class="form-control form-control-lg"> 
        </div>
        <div class="form-group">
            <label for="description"><i class="fa fa-comment"></i> Description</label>
            <span class="hint">How would you describe this show? Be descriptive, or ignore this field :)</span>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label><i class="fa fa-clock"></i> Scheduler</label>
            <span class="hint">Set the date/days and time when this show is being aired.</span>
            
            <div class="row">
                <div class="col-12 mb-2">
                    <div class="tyle-selector py-2">
                        <label>One-Time</label>
                        <input type="radio" name="repeat_type" onclick="activateOneTime()">
                        <span class="px-3">or</span>  
                        <label>Weekly</label>
                        <input type="radio" checked name="repeat_type" onclick="activateWeekly()">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div id="date-picker" class="date-picker collapse">
                        <select class="form-control w-25 d-inline" name="day" id="day">
                            @foreach($formValues->days as $day)
                            @if($formValues->current_date->day == $day) 
                            <option selected="selected" value="{{$day}}">{{$day}}</option>
                            @else
                            <option value="{{$day}}">{{$day}}</option>
                            @endif
                            @endforeach
                        </select>
                        <select class="form-control w-25 d-inline" name="month" id="month">
                            @foreach($formValues->months as $month)
                            @if($formValues->current_date->month == $month) 
                            <option selected="selected" value="{{$month}}">{{$month}}</option>
                            @else
                            <option value="{{$month}}">{{$month}}</option>
                            @endif
                            @endforeach
                        </select>
                        <select class="form-control w-25 d-inline" name="year" id="year">
                            @foreach($formValues->years as $year)
                            @if($formValues->current_date->year == $year) 
                            <option selected="selected" value="{{$year}}">{{$year}}</option>
                            @else
                            <option value="{{$year}}">{{$year}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div id="days-picker" class="days-picker" style="min-height: 100px">
                        <select name="days[]" multiple id="days" size="7" class="form-control">
                            @foreach($formValues->weekly_days as $w_day)
                            <option value="{{$w_day}}" @if($formValues->current_day_in_week == $w_day) selected @endif>{{$formValues->day_names[$w_day-1]}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <hr class="d-block d-md-none">
                    <div class="time-picker">
                        <label style="font-size: 20px">@</label>
                        <select class="form-control w-25 d-inline" name="hour" id="hour">
                            @foreach($formValues->hours as $hour) 
                            @if($formValues->current_date->hour == $hour) 
                            <option selected="selected" value="{{$hour}}">{{$hour}}</option>
                            @else
                            <option value="{{$hour}}">{{$hour}}</option>
                            @endif
                            @endforeach
                        </select>
                        <select class="form-control w-25 d-inline" name="minute" id="minute">
                            @foreach($formValues->minutes as $minute) 
                            @if($formValues->current_date->minute == $minute) 
                            <option selected="selected" value="{{$minute}}">{{$minute}}</option>
                            @else
                            <option value="{{$minute}}">{{$minute}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <hr>
                    <div class="form-check">
                        <input type="checkbox" name="notifications" id="notifications">
                        <label for="notifications">Notifications</label>
                        <span class="hint">By default: Push and SMS</span>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="public" id="public">
                        <label for="public">Public</label>
                        <span class="hint"><a href="#">What does this mean?</a></span>
                    </div>
                </div>
                
            </div>
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