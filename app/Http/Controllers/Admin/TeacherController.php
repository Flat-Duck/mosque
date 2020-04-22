<?php

namespace App\Http\Controllers\Admin;

use App\Teacher;
use App\Mosque;
use App\Nationality;
use App\Gender;
use App\Status;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    /**
     * Display a list of Teachers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::getList();

        return view('admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new Teacher
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mosques = Mosque::all();
        $nationalities = Nationality::all();
        $genders = Gender::all();
        $statuses = Status::all();

        $designationOptions = Teacher::$designationOptions;

        $descriptionOptions = Teacher::$descriptionOptions;

        $certificateOptions = Teacher::$certificateOptions;

        return view('admin.teachers.add', compact('designationOptions', 'descriptionOptions', 'certificateOptions', 'mosques', 'nationalities', 'genders', 'statuses'));
    }

    /**
     * Save new Teacher
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Teacher::validationRules());

        $teacher = Teacher::create($validatedData);

        return redirect()->route('admin.teachers.index')->with([
            'type' => 'success',
            'message' => 'Teacher added'
        ]);
    }

    /**
     * Show the form for editing the specified Teacher
     *
     * @param \App\Teacher $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $mosques = Mosque::all();
        $nationalities = Nationality::all();
        $genders = Gender::all();
        $statuses = Status::all();

        $designationOptions = Teacher::$designationOptions;

        $descriptionOptions = Teacher::$descriptionOptions;

        $certificateOptions = Teacher::$certificateOptions;

        return view('admin.teachers.edit', compact('teacher', 'designationOptions', 'descriptionOptions', 'certificateOptions', 'mosques', 'nationalities', 'genders', 'statuses'));
    }

    /**
     * Update the Teacher
     *
     * @param \App\Teacher $teacher
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Teacher $teacher)
    {
        $validatedData = request()->validate(
            Teacher::validationRules($teacher->id)
        );

        $teacher->update($validatedData);

        return redirect()->route('admin.teachers.index')->with([
            'type' => 'success',
            'message' => 'Teacher Updated'
        ]);
    }

    /**
     * Delete the Teacher
     *
     * @param \App\Teacher $teacher
     * @return void
     */
    public function destroy(Teacher $teacher)
    {
        if ($teacher->exams()->count()) {
            return redirect()->route('admin.teachers.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $teacher->delete();

        return redirect()->route('admin.teachers.index')->with([
            'type' => 'success',
            'message' => 'Teacher deleted successfully'
        ]);
    }
}
