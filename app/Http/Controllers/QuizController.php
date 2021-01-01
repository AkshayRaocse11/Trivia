<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Question\Question;

class QuizController extends Controller
{

    public function index()
    {
        //returning the create user name blade to start the quiz or game
        return view('quiz.start_quiz');
    }


    public function create()
    {
    }


    public function store(Request $request)
    {
        // storing the name of the user who starts the game and proceeds to the next question and answers page.
        if($request->has('name')){
        $quiz=User::create($request->all());
        $make_answer_null = Quiz::whereNotNull(['question','your_answer'])->get();
        foreach ($make_answer_null as $item) {
            // im making the value as null to hold the info about the question is attempeted or not, this will make null when user is created to get only one question per page
            $item->your_answer = NULL;
            $item->update();
        }
        return redirect()->route('quiz.show',$quiz->id);
        }
        //creating the set of new questions and answers for the game
        Quiz::create($request->all());
        return back();
    }


    public function show($id)
    {
        // getting only questions which or not null and  retriving all the answers of the questions From Answer Model
        $question = Quiz::whereNull('your_answer')->whereNotNull('question')->get();
        $answer = Answer::all();
        return view('quiz.que_ans',compact('question','answer'));

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, Quiz $quiz)
    {
        
    }


    public function destroy($id)
    {
        //
    }
}
