<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function subject() 
    {
        $subject = Subject::all();
        return view('admin.subject-details',['subject'=>$subject]);
    }
    public function Addsubject(Request $request)
    {
        $request->validate([
            'subject' => 'required'
          

        ]);
        $data = $request->all();
        Subject::create([
            'subject' => $data['subject']
        ]);
        if ($request == '') {
            return back()->with('error', 'Somthing went wrong!!.');
        } else {

            return back()->with('success', 'Subject information Submited Successfully.');
        }
    }
}
