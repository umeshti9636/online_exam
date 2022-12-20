<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;


class QuestionController extends Controller
{
    public function Question()
    {
        $subject = Question::all();
        $Ans = Answer::with('question')->get();
        return view('admin.question-details', ['Question' => $subject,'Answer'=>$Ans]);


        // $subjects = Subject::all();
        // $exam = Exam::with('subjects')->get();
        // return view('admin.exam_details', ['exams' => $exam, 'subject' => $subjects]);
    }
    public function Addquestion(Request $request)
    {
        try{
            $questionId = Question::insertGetId([
                'question'=>$request->question
            ]);
            foreach($request->ans as $answer){
            Answer::insert([
                'question_id'=>$questionId,
                'ans'=>$answer
            ]);
            }
            return back()->with('success', 'Question & Answer Submited Successfully.');
            //return response()->json(['succsess' => false, 'msg'=>'Exam Success' ]);

        }catch(\Exception $e){
            //return response()->json(['succsess'=>false,'msg'=>$e->getMessage()]);
            return back()->with('error', 'Somthing went wrong!!.');
        }

       
    }
    // public function AnswerUpdate($id){
       
    //    $subject = Question::find($id);
    //    return view('admin.answer-update',['que' => $subject]);
    
    // }
}
