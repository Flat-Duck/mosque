<?php

namespace App\Http\Controllers\User;

use App\Mosque;
use App\Student;
use App\Nationality;
use App\Gender;
use App\Status;
use App\Level;
use App\Course;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
class StudentController extends Controller
{
    /**
     * Display a list of Students.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//                $newId = Student::latest()->first()->id+1;
//         $newSecq = Carbon::now()->format('y'). "2" .request()->gender_id ;


//         $enrolment_number =$newSecq. $newId;
// dd($enrolment_number);
        $students = Student::getList();

        return view('user.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new Student
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nationalities = Nationality::all();
        $genders = Gender::all();
        $statuses = Status::all();
        $levels = Level::all();
      //  $mosques = Mosque::all();
        $courses = Course::where(['mosque_id'=>Auth::user()->teacher->mosque_id])->get();

        return view('user.students.add', compact('nationalities', 'genders', 'statuses', 'levels','courses'));// ,'mosques'));
    }

    /**
     * Save new Student
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $newId = Student::where(['mosque_id'=>Auth::user()->teacher->mosque_id])->whereYear('created_at', Carbon::now()->year)->count()+1;
        $newSecq = Auth::user()->teacher->mosque_id. Carbon::now()->format('y');
        $enrolment_number = $newSecq. $newId;
        // dd($enrolment_number);

        request()->merge(['enrolment_number'=>$enrolment_number]);
        request()->merge(['mosque_id'=>Auth::user()->teacher->mosque_id]);
        $validatedData = request()->validate(Student::validationRules());

        $student = Student::create($validatedData);

        return redirect()->route('user.students.index')->with([
            'type' => 'success',
            'message' => 'تمت الاضافة بنجاح'
        ]);
    }

    /**
     * Show the form for editing the specified Student
     *
     * @param \App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $nationalities = Nationality::all();
        $genders = Gender::all();
        $statuses = Status::all();
        $levels = Level::all();
        $mosques = Mosque::all();
        $courses = Course::where(['mosque_id'=>Auth::user()->teacher->mosque_id])->get();

        return view('user.students.edit', compact('student', 'nationalities', 'genders', 'statuses', 'levels','mosques','courses'));
    }

    /**
     * Update the Student
     *
     * @param \App\Student $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Student $student)
    {
        $validatedData = request()->validate(
            Student::validationRules($student->id)
        );

        $student->update($validatedData);

        return redirect()->route('user.students.index')->with([
            'type' => 'success',
            'message' => 'تم التعديل بنجاح'
        ]);
    }

    /**
     * Delete the Student
     *
     * @param \App\Student $student
     * @return void
     */
    public function destroy(Student $student)
    {
        if ($student->exams()->count()) {
            return redirect()->route('user.students.index')->with([
                'type' => 'error',
                'message' => 'لايمكن حذف هذا السجل لانه مرتبط بعلاقات اخرى'
            ]);
        }

        $student->delete();

        return redirect()->route('user.students.index')->with([
            'type' => 'success',
            'message' => 'تم الحذف بنجاح'
        ]);
    }
}
