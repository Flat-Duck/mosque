<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Level;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * Display a list of Courses.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::getList();

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new Course
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::all();

        return view('admin.courses.add', compact('levels'));
    }

    /**
     * Save new Course
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Course::validationRules());

        $course = Course::create($validatedData);

        return redirect()->route('admin.courses.index')->with([
            'type' => 'success',
            'message' => 'تمت الاضافة بنجاح'
        ]);
    }

    /**
     * Show the form for editing the specified Course
     *
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $levels = Level::all();

        return view('admin.courses.edit', compact('course', 'levels'));
    }

    /**
     * Update the Course
     *
     * @param \App\Course $course
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Course $course)
    {
        $validatedData = request()->validate(
            Course::validationRules($course->id)
        );

        $course->update($validatedData);

        return redirect()->route('admin.courses.index')->with([
            'type' => 'success',
            'message' => 'تم التعديل بنجاح'
        ]);
    }

    /**
     * Delete the Course
     *
     * @param \App\Course $course
     * @return void
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('admin.courses.index')->with([
            'type' => 'success',
            'message' => 'تم الحذف بنجاح'
        ]);
    }
}
