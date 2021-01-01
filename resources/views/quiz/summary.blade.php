@extends('layout.master')
@section('title', 'Summary')
@section('content')
<div class="container">

    <div class="alert alert-success">
        <div class="d-block m-auto player-text"> Hello, {{$users->name}}</div>
    </div>
    <div class="alert alert-info">
        <div class="d-block m-auto player-text"> Summary of the Game
            <a href="/" class="btn btn-sm btn-danger" style=" float:right; 
    max-width: 20%;">Finish</a>
        </div>
    </div>
    @forelse ($summary_datas as $summary_data)
    <div class="row">
        <br />
        <div class="panel panel-primary">
            <div class="panel-heading">
                <pre>
                     {{++$loop->index}} {{$summary_data->question}}
                          
               </pre>


            </div>
            <!--.panel-heading-->

            <div class="panel-body">
                @if ($summary_data->your_answer)
                <h4>Your Answer</h4><label for="radio1">{{$summary_data->your_answer}}</label>
                @else
                <h4>Your Answer</h4> <label for="radio1">{{$res}} </label>
                @endif
            </div>


        </div>
    </div>
    @empty
    No Summary Found
    @endforelse
    <div class="div" style="background: white">
    </div>
</div>
@stop

@section('scripts')

@endsection