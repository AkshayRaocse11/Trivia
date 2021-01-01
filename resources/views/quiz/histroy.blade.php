@extends('layout.master')
@section('title', 'Histroy')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm r">
            @forelse ($user as $item)
                <div class="panel panel-default">
                    <div class="panel-heading">Game {{++$loop->index}} {{ \Carbon\Carbon::parse($item->created_at)->format('d-M-Y H:i A')  }}</div>
                    <div class="panel-body">
                        <label for="">Name: {{$item->name}}</label>
                        @forelse ($question as $que)
                        @if ($que->name_id==$item->id)
                        <pre>
                            {{$que->question}} 
                           CorrectAnswer: {{$que->correct_answer}}
                           @if($que->your_answer)
                               YourAnswer: {{$que->your_answer}} 
                           @else
                                YourAnswer: {{$res}} 
                           @endif
                           
                        </pre>                             
                        @endif
                                                    
                        @empty
                        @endforelse
                    </div>
                </div>                
            @empty
                No Histroy Found
            @endforelse


        </div>
    </div>
</div>
@stop

@section('scripts')

@endsection