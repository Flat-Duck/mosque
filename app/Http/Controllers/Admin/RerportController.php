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
use App\Student;
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
        $reportName =' كشف بأسماء المساجد في منطقة  " ' .request()->city. '"';
        $mosques = DB::table('mosques')->where('address', 'like', '%' .request()->city. '%')->get();
        return view("admin.reports.mosques", compact('mosques','reportName'));
    }

    public function genders()
    {
        
        $gender = Gender::find(request()->gender_id)->name;
         $mosque = Mosque::find(request()->mosque_id)->name;
         $mosqueName = 'مسجد "' .$mosque. '"<br>';
        $reportName = $mosqueName .' كشف بأسماء طلبة  " ' .$gender. '"';

        $students = Student::where('mosque_id', request()->mosque_id)->where('gender_id', request()->gender_id)->get();
        return view("admin.reports.students", compact('students','reportName'));
    }

        public function teachers()
    {

         $mosque = Mosque::find(request()->mosque_id)->name;
         $mosqueName = 'مسجد "' .$mosque. '"<br>';
         $reportName = $mosqueName .' كشف بأسماء المعلمين  ';

        $teachers = Teacher::where('mosque_id', request()->mosque_id)->get();
        return view("admin.reports.teachers", compact('teachers','reportName'));
    }

    public function finishers()
    {
       $mosque = Mosque::find(request()->mosque_id)->name;
         $mosqueName = 'مسجد "' .$mosque. '"<br>';
         $level = Level::find(request()->level_id)->name;

        $reportName = $mosqueName .' كشف بأسماء الطلبة في مستوى  " ' .$level. '"';

        $exams = Exam::where('level_id',request()->level_id)->get();
        $students = null;
        foreach ($exams as $k => $exam) {
            
            $st = $exam->student;

            if($st->mosque_id == request()->mosque_id){
                $students[] = $st;
            }
        }
        
     //   dd($students);
        return view("admin.reports.students", compact('students','reportName'));
    }
}
