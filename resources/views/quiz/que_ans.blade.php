@extends('layout.master')
@section('title', 'Q&A')
@section('content')
<div class="container" style="background-color:#18214A;">
<div class="alert alert-success" >
 <div class="d-block m-auto player-text" >  Player Name : {{$users->name}}</div> 
</div>
    @forelse ($question->take(1) as $item)
    @if (!$item->your_answer && $item->question)
    @if ($item->question)
    <form action="{{route('summary.store')}}" method="post">
    @csrf
    <div class="row">
        <br />
        <div class="panel panel-primary">
            <div class="panel-heading">  
                <pre>
                      {{++$loop->index}}    {{$item->question}}  
               </pre>
            </div>
            <!--.panel-heading-->

            <div class="panel-body">
                <h4>Your Answer</h4>
                 <button type="submit" class="btn btn-sm btn-success " style="float: right;"><i class="fa fa-step-forward"></i>&ensp;Next</button>
            </div>

            <div class="panel-footer">
                <div class="row">
                    <div class="funkyradio">
                        <input type="hidden" value="{{$item->correct_answer}}" name="correct_answer">
                        
                        <input type="hidden" value="{{$item->question}}" name="question">
                        <input type="hidden" value="{{$item->id}}" name="question_id">
                        <input type="hidden" value="{{$users->id}}" name="name_id">
                        <input type="hidden" value="{{$item->mcq}}" >
                        @if ($item->mcq==2)
                        @foreach ($answer as $ans)
                              @if ($item->id ==$ans->question_id)
                        <div class="funkyradio-default float-right">
                            <input type="radio" name="your_answer"  value="{{$ans->answers}}" required/>
                            <label for="radio1">{{$ans->answers}}</label>
                        </div>      
                              @endif
                          @endforeach 
                        @else  
                        @foreach ($answer as $ans)
                              @if ($item->id ==$ans->question_id)
                        <div class="funkyradio-default float-right">
                            
                            <input type="checkbox" name="mcq_your_answer[]" value="{{$ans->answers}}" />
                            <label for="radio1">{{$ans->answers}}</label>
                        </div>      
                              @endif
                          @endforeach 
                        @endif  
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    </form>
    @endif
    @endif
    @empty
    <a href="{{route('answer.show',$users->id)}}" class="btn btn-sm btn-warning btn-style">View Summary</a> 
    @endforelse
</div>
@stop

@section('scripts')

@endsection