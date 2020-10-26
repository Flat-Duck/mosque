<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    
    /**
     * Display a list of Exams.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::getList();

        return view('admin.exams.index', compact('exams'));
    }

    /**
     * Show the form for creating a new Exam
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        $teachers = Teacher::all();
        $levels = Level::all();

        return view('admin.exams.add', compact('students', 'teachers', 'levels'));
    }

    /**
     * Save new Exam
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Exam::validationRules());

        $exam = Exam::create($validatedData);

        return redirect()->route('admin.exams.index')->with([
            'type' => 'success',
            'message' => 'Exam added'
        ]);
    }

    /**
     * Show the form for editing the specified Exam
     *
     * @param \App\Exam $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        $students = Student::all();
        $teachers = Teacher::all();
        $levels = Level::all();

        return view('admin.exams.edit', compact('exam', 'students', 'teachers', 'levels'));
    }

    /**
     * Update the Exam
     *
     * @param \App\Exam $exam
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Exam $exam)
    {
        $validatedData = request()->validate(
            Exam::validationRules($exam->id)
        );

        $exam->update($validatedData);

        return redirect()->route('admin.exams.index')->with([
            'type' => 'success',
            'message' => 'Exam Updated'
        ]);
    }

    /**
     * Delete the Exam
     *
     * @param \App\Exam $exam
     * @return void
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();

        return redirect()->route('admin.exams.index')->with([
            'type' => 'success',
            'message' => 'Exam deleted successfully'
        ]);
    }
}
