@extends('layouts.handler')
@section('content')
@include('show.partials.scheduler')

@endsection

@section('footer_scripts')
    @parent

       <script>
        function activateOneTime() {
            $("#date-picker").show();
            $("#days-picker").hide();
        }
        function activateWeekly() {
            $("#date-picker").hide();
            $("#days-picker").show();
        }
    </script>
@endsection