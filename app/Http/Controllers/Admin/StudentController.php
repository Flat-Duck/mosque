<?php

namespace App\Http\Controllers\Admin;

use App\Student;
use App\Nationality;
use App\Gender;
use App\Status;
use App\Level;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a list of Students.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::getList();

        return view('mosque.students.index', compact('students'));
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

        return view('mosque.students.add', compact('nationalities', 'genders', 'statuses', 'levels'));
    }

    /**
     * Save new Student
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Student::validationRules());

        $student = Student::create($validatedData);

        return redirect()->route('admin.students.index')->with([
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

        return view('admin.students.edit', compact('student', 'nationalities', 'genders', 'statuses', 'levels'));
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

        return redirect()->route('admin.students.index')->with([
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
            return redirect()->route('admin.students.index')->with([
                'type' => 'error',
                'message' => 'لايمكن حذف هذا السجل لانه مرتبط بعلاقات اخرى'
            ]);
        }

        $student->delete();

        return redirect()->route('admin.students.index')->with([
            'type' => 'success',
            'message' => 'تم الحذف بنجاح'
        ]);
    }
}
