<?php

namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function showForm(Request $request)
    {
        $exams =null;
      return view('result',compact('exams'));
    }
    public function calRes(Request $request)
    {
        $student = Student::where('enrolment_number',$request->enrolment_number)->first();
        $exams = $student->exams;

        foreach ($exams as $k => $exam) {
            //TODO
        }

        return view('result',compact('exams'));


        dd($student->exams);
        dd($request->all());
    }
}
