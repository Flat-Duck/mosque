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
        $mosques = Mosque::all();
        $courses = Course::all();

        return view('user.students.add', compact('nationalities', 'genders', 'statuses', 'levels','mosques','courses'));
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

        return redirect()->route('user.students.index')->with([
            'type' => 'success',
            'message' => 'Student added'
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

        return view('user.students.edit', compact('student', 'nationalities', 'genders', 'statuses', 'levels','mosques'));
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
            'message' => 'Student Updated'
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
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $student->delete();

        return redirect()->route('user.students.index')->with([
            'type' => 'success',
            'message' => 'Student deleted successfully'
        ]);
    }
}
