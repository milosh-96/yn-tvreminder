@extends('layouts.handler')
@section('content')
<div class="col-12">
    <div class="row">
        <div class="col-6">
            <div class="image text-center bg-dark" style="overflow:hidden">
                <img src="{{$show->cover_url}}"  style="height:250px">
            </div>
        </div>
        <div class="col-6">
            <h2>{{$show->title}}</h2>
            <p>{{$show->description}}</p>
        </div>
        
    </div>
    <div class="row my-5">
        <div class="col-12">
            <h3>Reminders</h3>
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="text-center">
                        <th>TV</th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                        <th>Saturday</th>
                        <th>Sunday</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($show->reminders as $reminder)
                    <tr class="text-center">
                        <td>{{$reminder->tv}}</td>
                        <td>{{$reminder->tonday ? $reminder->formattedTime() : '--:--'}}</td>
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