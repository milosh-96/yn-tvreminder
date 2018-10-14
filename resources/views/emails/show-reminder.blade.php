@extends('emails.layout')
@section('preheader')
{{$reminder->getShow->title}} begins at {{$reminder->formattedTime()}} on {{$reminder->tv}}
@endsection

@section('call_to_action')
Tune in on {{$reminder->tv}} at {{$reminder->formattedTime()}}
@endsection

@section('title_message')
{{$reminder->getShow->title}} is about to begin!
@endsection
@section('image',$reminder->getShow->cover_url)
@endsection