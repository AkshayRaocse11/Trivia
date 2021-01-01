@extends('layout.master')
@section('title', 'Trivia')
@section('content')
            <div class="container-fluid">
                <div class="row">
                        <div class="col-sm r"> 
                            <div class="data">
                                <div>  
                                    <img src='{{ asset('assets/images/logo.png') }}' width="180" lnext previousheight="180" id="image">
                                </div>
                                <div>
                                    <p id="name"> Trivia 
                                        Skill App</p>
                                </div>
                                <div>
                                    <a href="{{route('quiz.index')}}" id="link"><button type="button" class="Startbtn">Launch</button></a>
                                </div>
                                <div>
                                    @if ($users)
                                    <a href="{{route('summary.index')}}" id="link"><button type="button" class="Startbtn">Game Histroy</button></a>                                        
                                    @endif

                                </div>                                
                            </div>
                        </div>   
              </div>
            </div>   
@stop

@section('styles')
   <link rel="stylesheet" href="{{ asset('assets/css/quiz.css') }}"> 
@endsection

@section('scripts')

@endsection