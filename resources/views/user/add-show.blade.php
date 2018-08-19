@extends('layouts.user')
@section('content')

 <div class="cell-12">
                        <form action="#">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" placeholder="Enter a title" />
                                <small class="text-muted">Doesn't have to be a real show name. Type here how you remembered show.</small>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="cell-12 cell-md-6">
                                        <label>Begins On</label>
                                        <input type="text" data-role="datepicker"> 
                                        <small class="text-muted">Date when the show starts to air. Doesn't have to be correct date, if you don't know.</small>
                                    </div>
                                    <div class="cell-12 cell-md-6">
                                        <label>Show Start Time</label>
                                        <input data-role="timepicker">
                                        <small class="text-muted">Time when shows starts on TV.</small>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea data-role="textarea"></textarea>
                            </div>
                        </form>
                    </div>
@endsection