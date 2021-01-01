<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Quiz;
use App\Models\Summary;
use Illuminate\Http\Request;

class AnswerController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        // storing the answers for questions
        Answer::create($request->all());
        return back();
    }


    public function show($id)
    {
        // after user submitted the questions , Showing the summary of the game
        $summary_datas =Summary::where('name_id','=',$id)->get();
        $result = [];
        foreach ($summary_datas as $key => $value) {
            if($value->mcq_your_answer){
            $result=$value->mcq_your_answer;
            }
            
        }
        $res = json_encode($result);
        $res = preg_replace("/[^a-zA-Z 0-9 ,]+/", "", $res );
        return view('quiz.summary',compact('summary_datas','res'));
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
