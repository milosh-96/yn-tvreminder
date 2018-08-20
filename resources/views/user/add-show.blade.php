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
                            <option value="{{$day}}">{{$day}}</option>
                            @endforeach
                        </select>
                        <select class="form-control w-25 d-inline" name="month" id="month">
                            @foreach($formValues->months as $month) 
                            <option value="{{$month}}">{{$month}}</option>
                            @endforeach
                        </select>
                        <select class="form-control w-25 d-inline" name="year" id="year">
                            @foreach($formValues->years as $year) 
                            <option value="{{$year}}">{{$year}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="days-picker" class="days-picker">
                        <select name="days[]" multiple id="days" class="form-control">
                            <option value="1">Monday</option>
                            <option value="2">Tueday</option>
                            <option value="3">Wednesday</option>
                            <option value="4">Thursday</option>
                            <option value="5">Friday</option>
                            <option value="6">Saturday</option>
                            <option value="7">Sunday</option>
                        </select>
                    </div>
                </div>
                    <div class="col-12 col-md-6">
                        <div class="time-picker">
                            <select class="form-control w-25 d-inline" name="hour" id="hour">
                                @foreach($formValues->hours as $hour) 
                                <option value="{{$hour}}">{{$hour}}</option>
                                @endforeach
                            </select>
                            <select class="form-control w-25 d-inline" name="minute" id="minute">
                                @foreach($formValues->minutes as $minute) 
                                <option value="{{$minute}}">{{$minute}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                </div>
            </div>
        </form>
    </div>
    @endsection