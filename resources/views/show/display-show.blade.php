@extends('layouts.handler')
@section('title','Show: '.$show->title)
@section('content')
<div class="col-12">
    <div class="row">
        <div class="col-6">
            <div class="image text-center bg-dark" style="overflow:hidden">
                <img src="{{$show->cover_url}}"  style="height:250px">
            </div>
        </div>
        <div class="col-6">
            <small>Show created by <a href="#">{{$show->getUser->user_name}}</a></small>
            <h2>{{$show->title}}</h2>
            <p>{{$show->description}}</p>
        </div>
        
    </div>
    <div class="row my-5">
        <div class="col-12">
            <h3>Reminders</h3>
            <table class="table table-striped table-hover table-responsive">
                <thead>
                    <tr class="text-center">
                        <th></th>
                        <th>TV</th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                        <th>Saturday</th>
                        <th>Sunday</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($show->reminders as $reminder)
                    <tr class="text-center">
                        <td>
                        @if(auth()->check())
                        @if(auth()->user()->id == $show->getUser->id)
                            <a href="{{route('reminder.edit',[$show->hash,$reminder->hash])}}">
                                <i class="fa fa-edit"></i>
                            </a>
                                <form class="d-inline" action="{{route('reminder.delete',[$show->hash,$reminder->hash])}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="link"><i class="fa fa-trash"></i></button>
                                </form>
                            </a>
                        @endif
                        @endif
                        </td>
                        <td>{{$reminder->tv}}</td>
                        <td>{{$reminder->monday ? $reminder->formattedTime() : '--:--'}}</td>
                        <td>{{$reminder->tuesday ? $reminder->formattedTime() : '--:--'}}</td>
                        <td>{{$reminder->wednesday ? $reminder->formattedTime() : '--:--'}}</td>
                        <td>{{$reminder->thursday ? $reminder->formattedTime() : '--:--'}}</td>
                        <td>{{$reminder->friday ? $reminder->formattedTime() : '--:--'}}</td>
                        <td>{{$reminder->saturday ? $reminder->formattedTime() : '--:--'}}</td>
                        <td>{{$reminder->sunday ? $reminder->formattedTime() : '--:--'}}</td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('footer_scripts')
@parent
@endsection