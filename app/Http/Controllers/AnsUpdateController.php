<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;

class AnsUpdateController extends Controller
{
    public function AnswerUpdate($id)
    {

        $subject = Question::find($id);
        $Ans = Answer::whereQuestion_id($id)->get();
        $url = url('Addans') . "/" . $id;
        return view('admin.answer-update', ['que' => $subject, 'Answer' => $Ans,'url'=>$url]);
    }


    public function Addans($id,Request $request)
    {
        $request->validate([

            'is_correct' => 'required',
        ]);
       
        $view = Question::find($id);
        $view->question = $request['question'];
        $view->is_correct = $request['is_correct'];
        $view->save();
       
        if ($request == '') {
            return back()->with('error', 'Somthing went wrong!!.');
        } else {
            return redirect('/admin/question')->with('success', 'Correct Answer Submited Successfully.');
        }
       
    }

 }

