@extends('emails.layout')
@section('preheader')
{{$show->title}} begins at {{$reminder->formattedTime()}} on {{$reminder->tv}}
@endsection

@section('call_to_action')
Tune in on {{$reminder->tv}} at {{$reminder->formattedTime()}}
@endsection