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
        return view('admin.exam', ['subject' => $exam]);
    }
    public function Addexam(Request $request)
    {
        $request->validate([
            'exam_name' => 'required',
            'subject_id' => 'required',
            'exam_date' => 'required'

        ]);
        $data = $request->all();
        Exam::create([
            'exam_name' => $data['exam_name'],
            'subject_id' => $data['subject_id'],
            'exam_date' => $data['exam_date']
        ]);
        if ($request == '') {
            return back()->with('error', 'Somthing went wrong!!.');
        } else {

            return back()->with('success', 'Subject information Submited Successfully.');
        }
    }
}
