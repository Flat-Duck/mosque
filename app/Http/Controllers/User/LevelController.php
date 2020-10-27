<?php

namespace App\Http\Controllers\User;

use App\Level;
use App\Http\Controllers\Controller;

class LevelController extends Controller
{
    /**
     * Display a list of Levels.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::getList();

        return view('user.levels.index', compact('levels'));
    }

    /**
     * Show the form for creating a new Level
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.levels.add');
    }

    /**
     * Save new Level
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Level::validationRules());

        $level = Level::create($validatedData);

        return redirect()->route('user.levels.index')->with([
            'type' => 'success',
            'message' => 'تمت الاضافة بنجاح'
        ]);
    }

    /**
     * Show the form for editing the specified Level
     *
     * @param \App\Level $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        return view('user.levels.edit', compact('level'));
    }

    /**
     * Update the Level
     *
     * @param \App\Level $level
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Level $level)
    {
        $validatedData = request()->validate(
            Level::validationRules($level->id)
        );

        $level->update($validatedData);

        return redirect()->route('user.levels.index')->with([
            'type' => 'success',
            'message' => 'تم التعديل بنجاح'
        ]);
    }

    /**
     * Delete the Level
     *
     * @param \App\Level $level
     * @return void
     */
    public function destroy(Level $level)
    {
        if ($level->students()->count() || $level->exams()->count() || $level->courses()->count()) {
            return redirect()->route('user.levels.index')->with([
                'type' => 'error',
                'message' => 'لايمكن حذف هذا السجل لانه مرتبط بعلاقات اخرى'
            ]);
        }

        $level->delete();

        return redirect()->route('user.levels.index')->with([
            'type' => 'success',
            'message' => 'تم الحذف بنجاح'
        ]);
    }
}
