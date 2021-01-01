@extends('layout.master')
@section('title', 'Create Quiz')
@section('content')
<div class="container " style="background: white">
    <a href="/" id="link"><button type="button" class="btn btn-warning btn-style">Home</button></a>
    <div class="row">
        <div class="col-lg-12">
            <form class="card" action="{{route('quiz.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <h3 class="card-title">Create Question First</h3>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="form-label">Question</label>
                                <input type="text" class="form-control" placeholder="enter" name="question">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Question Type MCQ</label>
                                <select name="mcq" class="form-control">
                                    <option disabled selected>Select</option>
                                    <option value="1">yes</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Correct Answer</label>
                                <input type="text" class="form-control" placeholder="correct_answer"
                                    name="correct_answer">
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
            <h3 class="card-title">Create Answers for Question Each Time</h3>
            @forelse ($quiz as $item)
            @if ($item->question)
                
            
            <form class="card" action="{{route('answer.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                    @if($item->mcq==1)
                                        <label for="">MCQ Question Type</label> <br>
                                    @else 
                                        <label for="">Radio Button Question</label> <br>   
                                    @endif   
                                <input type="text" class="form-control" placeholder="enter" name="question"
                                    value="{{$item->question}}" readonly>
                                <input type="hidden" class="form-control" placeholder="enter" name="question_id"
                                    value="{{$item->id}}" readonly>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">                                 
                                <label class="form-label">Answer</label>
                                <input type="text" class="form-control" placeholder="answers" name="answers">
                                @forelse ($answer as $ans)
                                    @if ($item->id==$ans->question_id)
                                        <label for="">Answer{{++$loop->index}} {{$ans->answers}}</label> <br>
                                    @endif

                                @empty
                                @endforelse
                            
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-info">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
            @endif
            @empty
            Add Questions Please
            @endforelse
        </div>
    </div>
</div>
@stop

@section('scripts')

@endsection