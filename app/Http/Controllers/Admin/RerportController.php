<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Nationality;
use App\Gender;
use App\Mosque;
use App\Teacher;
use App\User;
use App\Level;
use App\Exam;
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
        return view("admin.reports.generator",compact('nationalities','genders','mosques','teachers','users','levels'));
    }
    public function mosques()
    {
        $mosques = DB::table('mosques')->where('address', 'like', '%' .request()->city. '%')->get();
        return view("admin.reports.mosques", compact('mosques'));
    }
    public function finishers()
    {
        $exams = Exam::where('level_id',request()->level_id)->get();
        $students = null;
        foreach ($exams as $k => $exam) {
            
            $st = $exam->student;

            if($st->mosque_id == request()->mosque_id){
                $students[] = $st;
            }
        }
        
     //   dd($students);
        return view("admin.reports.students", compact('students'));
    }
}
