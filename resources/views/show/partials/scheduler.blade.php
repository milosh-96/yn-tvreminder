@section('bar_title',$formValues->show->title)
<div class="col-12 mb-2">
<form action="{{$formValues->form_route}}" method="POST">
@csrf
<input type="hidden" name="_method" value="{{$formValues->form_method}}">
                    <div class="tyle-selector py-2">
                        <label>One-Time</label>
                        <input type="radio" name="repeat_type" value="onetime" onclick="activateOneTime()">
                        <span class="px-3">or</span>  
                        <label>Weekly</label>
                        <input type="radio" checked name="repeat_type" value="weekly" onclick="activateWeekly()">
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
                            <!--ADD SELECTED FIELDS BASED ON DB RECORD WHEN EDIT MODE IS ACTIVE-->
                            @foreach($formValues->weekly_days as $key => $value)
                           
                            <?php $keyNo = $key-1; ?>
                            
                            <option value="{{strtolower($formValues->day_names[$keyNo])}}" @if($value == true)selected="selected" @endif>{{$formValues->day_names[$keyNo]}}</option>
                            
                            
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
                        <span class="d-inline px-2">on</span>
                        <input type="text" class="w-25 form-control d-inline" name="tv_channel" placeholder="TV channel" value="{{$formValues->tv}}">
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
                    <hr>
                    <div class="form-group">
                        <button class="btn btn-gradient">Schedule</button>
                    </div>
                    </form>
                </div>
                


