<?php

namespace App\Http\Controllers\Admin;

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

        return view('admin.levels.index', compact('levels'));
    }

    /**
     * Show the form for creating a new Level
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.levels.add');
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

        return redirect()->route('admin.levels.index')->with([
            'type' => 'success',
            'message' => 'Level added'
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
        return view('admin.levels.edit', compact('level'));
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

        return redirect()->route('admin.levels.index')->with([
            'type' => 'success',
            'message' => 'Level Updated'
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
            return redirect()->route('admin.levels.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $level->delete();

        return redirect()->route('admin.levels.index')->with([
            'type' => 'success',
            'message' => 'Level deleted successfully'
        ]);
    }
}
