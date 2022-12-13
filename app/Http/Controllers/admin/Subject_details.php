<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class Subject_details extends Controller
{
    public function subject(){
        
        return view('admin.subject_details');
    }
}
