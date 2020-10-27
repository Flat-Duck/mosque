<?php

namespace App\Http\Controllers\User;
use App\Teacher;
use App\Course;
use App\Level;
use App\Room;
use Auth;
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

        return view('user.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new Course
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::all();
        $teachers = Teacher::where(['mosque_id'=>Auth::user()->teacher->mosque_id])->get();
        $rooms = Room::where(['mosque_id'=>Auth::user()->teacher->mosque_id])->get();
        return view('user.courses.add', compact('levels','teachers','rooms'));
    }

    /**
     * Save new Course
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
         request()->merge(['mosque_id'=>Auth::user()->teacher->mosque_id]);
        $validatedData = request()->validate(Course::validationRules());

        $course = Course::create($validatedData);

        return redirect()->route('user.courses.index')->with([
            'type' => 'success',
            'message' => 'Course added'
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
        $teachers = Teacher::where(['mosque_id'=>Auth::user()->teacher->mosque_id])->get();
        $rooms = Room::where(['mosque_id'=>Auth::user()->teacher->mosque_id])->get();
        return view('user.courses.edit', compact('course', 'levels','teachers','rooms'));
    }

    /**
     * Update the Course
     *
     * @param \App\Course $course
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Course $course)
    {
        request()->merge(['mosque_id'=>Auth::user()->teacher->mosque_id]);
        $validatedData = request()->validate(
            Course::validationRules($course->id)
        );

        $course->update($validatedData);

        return redirect()->route('user.courses.index')->with([
            'type' => 'success',
            'message' => 'Course Updated'
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
        // $course->delete();

          $course->toggleActivation();

        return redirect()->route('user.courses.index')->with([
            'type' => 'success',
            'message' => 'Course deleted successfully'
        ]);
    }
}
