<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Summary;
use App\Models\User;
use Illuminate\Http\Request;

class SummaryController extends Controller
{

    public function index()
    {
        //it helps to get histroy of players who all are played in the past and who all are tried to play this game.
        $question = Summary::all();
        $user = User::with('summary')->latest()->get();

        $result = [];
        foreach ($question as  $value) {
        // casted array in Summary model need to remove the special characters like "" and []  
            if($value->mcq_your_answer){
                $result=$value->mcq_your_answer;
            }
        }
        $res = json_encode($result);
        $res = preg_replace("/[^a-zA-Z 0-9 ,]+/", "", $res );   
        return view('quiz.histroy',compact('user','question','res'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //helps to store the Summary of the result 
        Summary::create($request->all());
        $quiz = Quiz::find($request->question_id);
        $quiz->your_answer = 'done';
        $quiz->update();
        return back();
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
