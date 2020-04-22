<?php

namespace App\Http\Controllers\Admin;

use App\Gender;
use App\Http\Controllers\Controller;

class GenderController extends Controller
{
    /**
     * Display a list of Genders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genders = Gender::getList();

        return view('admin.genders.index', compact('genders'));
    }

    /**
     * Show the form for creating a new Gender
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.genders.add');
    }

    /**
     * Save new Gender
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Gender::validationRules());

        $gender = Gender::create($validatedData);

        return redirect()->route('admin.genders.index')->with([
            'type' => 'success',
            'message' => 'Gender added'
        ]);
    }

    /**
     * Show the form for editing the specified Gender
     *
     * @param \App\Gender $gender
     * @return \Illuminate\Http\Response
     */
    public function edit(Gender $gender)
    {
        return view('admin.genders.edit', compact('gender'));
    }

    /**
     * Update the Gender
     *
     * @param \App\Gender $gender
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Gender $gender)
    {
        $validatedData = request()->validate(
            Gender::validationRules($gender->id)
        );

        $gender->update($validatedData);

        return redirect()->route('admin.genders.index')->with([
            'type' => 'success',
            'message' => 'Gender Updated'
        ]);
    }

    /**
     * Delete the Gender
     *
     * @param \App\Gender $gender
     * @return void
     */
    public function destroy(Gender $gender)
    {
        if ($gender->teachers()->count() || $gender->students()->count()) {
            return redirect()->route('admin.genders.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $gender->delete();

        return redirect()->route('admin.genders.index')->with([
            'type' => 'success',
            'message' => 'Gender deleted successfully'
        ]);
    }
}
