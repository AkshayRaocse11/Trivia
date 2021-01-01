@extends('layout.master')
@section('title', 'Histroy')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm r2">
        @if (!$quiz->isEmpty())
            <form class="panel" action="{{route('quiz.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="panel-body">
                    <h3 class="panel-title">Start Quiz</h3>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" placeholder="enter" name="name">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-info">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </form>
        @else
        <br>
        <div style="background: white; height:50vh;">
        <a href="/register"  > <br>
    <div class="alert alert-success">
        <div class="d-block m-auto player-text"> Please First Create the Quiz to Start it.</div>
    </div>             
            
            <button type="button" class="btn btn-sm btn-warning btn-style">Create Quiz</button></a>  
        </div>            
        @endif          
        </div>
        @stop

        @section('scripts')

        @endsection