<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Exam;



class ExamController extends Controller
{
    public function Exam()
    {
        $exam = Subject::all();
        return view('admin.exam_details', ['subject' => $exam]);
    }
    public function Addexam(Request $request)
    {
        $request->validate([
            'exam_name' => 'required',
            'subject_id' => 'required',
            'exam_date' => 'required',
            'exam_time' => 'required',
            'attempt'=>'required'

        ]);
        $data = $request->all();
        Exam::create([
            'exam_name' => $data['exam_name'],
            'subject_id' => $data['subject_id'],
            'exam_date' => $data['exam_date'],
            'exam_time' => $data['exam_time'],
            'attempt'=>$data['attempt']
            
        ]);
        if ($request == '') {
            return back()->with('error', 'Somthing went wrong!!.');
        } else {

            return redirect('/admin/exam_details')->with('success', 'Exam information Submited Successfully.');
        }
    }
    public function exam_details()
    {
       
        $subjects =Subject::all();
        $exam = Exam::with('subjects')->get();
        return view('admin.exam_details', ['exams' => $exam,'subject'=>$subjects]);
    }
}
