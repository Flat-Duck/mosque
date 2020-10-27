<?php

namespace App\Http\Controllers\User;

use App\Exam;
use App\Student;
use App\Teacher;
use App\Level;
use App\Http\Controllers\Controller;
use Auth;

class ExamController extends Controller
{
    /**
     * Display a list of Exams.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::getList();

        return view('user.exams.index', compact('exams'));
    }

    /**
     * Show the form for creating a new Exam
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::where(['mosque_id'=>Auth::user()->teacher->mosque_id])->get();
        $teachers = Teacher::where(['mosque_id'=>Auth::user()->teacher->mosque_id])->get();
        $levels = Level::all();

        return view('user.exams.add', compact('students', 'teachers', 'levels'));
    }

    /**
     * Save new Exam
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        request()->merge(['mosque_id'=>Auth::user()->teacher->mosque_id]);
        $validatedData = request()->validate(Exam::validationRules());

        $exam = Exam::create($validatedData);

        return redirect()->route('user.exams.index')->with([
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
        $students = Student::where(['mosque_id'=>Auth::user()->teacher->mosque_id])->get();
        $teachers = Teacher::where(['mosque_id'=>Auth::user()->teacher->mosque_id])->get();
        $levels = Level::all();

        return view('user.exams.edit', compact('exam', 'students', 'teachers', 'levels'));
    }

    /**
     * Update the Exam
     *
     * @param \App\Exam $exam
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Exam $exam)
    {
        request()->merge(['mosque_id'=>Auth::user()->teacher->mosque_id]);
        $validatedData = request()->validate(
            Exam::validationRules($exam->id)
        );

        $exam->update($validatedData);

        return redirect()->route('user.exams.index')->with([
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

        return redirect()->route('user.exams.index')->with([
            'type' => 'success',
            'message' => 'Exam deleted successfully'
        ]);
    }
}
