<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Nationality;
use App\Gender;
use App\Mosque;
use App\Teacher;
use App\User;
use App\Level;
use App\Exam;
use App\Student;
use Auth;
use DB;
//use App\Nationality;

class RerportController extends Controller
{
    public function index()
    {
        $nationalities = Nationality::all();
        $genders = Gender::all();   
        $mosques = Mosque::all();
        $teachers = Teacher::all();
        $levels = Level::all();
        $users = User::all();
        return view("user.reports.generator",compact('nationalities','genders','mosques','teachers','users','levels'));
    }
    public function mosques()
    {
        $mosques = DB::table('mosques')->where('address', 'like', '%' .request()->city. '%')->get();
        return view("user.reports.mosques", compact('mosques'));
    }

    public function genders()
    {
     //   dd(Auth::guard('web')->user()->teacher->mosque_id);
        $students = Student::where('mosque_id', Auth::guard('web')->user()->teacher->mosque_id)->where('gender_id', request()->gender_id)->get();
        return view("user.reports.students", compact('students'));
    }

        public function teachers()
    {
        $teachers = Teacher::where('mosque_id', Auth::guard('web')->user()->teacher->mosque_id)->get();
        return view("user.reports.teachers", compact('teachers'));
    }

    public function finishers()
    {
        $exams = Exam::where('level_id',request()->level_id)->get();
        $students = null;
        foreach ($exams as $k => $exam) {
            
            $st = $exam->student;

            if($st->mosque_id == Auth::guard('web')->user()->teacher->mosque_id){
                $students[] = $st;
            }
        }
        
     //   dd($students);
        return view("user.reports.students", compact('students'));
    }
}
