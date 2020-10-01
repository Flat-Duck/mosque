<?php

namespace App\Http\Controllers\User;

use App\Status;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    /**
     * Display a list of Statuses.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::getList();

        return view('user.statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new Status
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.statuses.add');
    }

    /**
     * Save new Status
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Status::validationRules());

        $status = Status::create($validatedData);

        return redirect()->route('user.statuses.index')->with([
            'type' => 'success',
            'message' => 'Status added'
        ]);
    }

    /**
     * Show the form for editing the specified Status
     *
     * @param \App\Status $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        return view('user.statuses.edit', compact('status'));
    }

    /**
     * Update the Status
     *
     * @param \App\Status $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Status $status)
    {
        $validatedData = request()->validate(
            Status::validationRules($status->id)
        );

        $status->update($validatedData);

        return redirect()->route('user.statuses.index')->with([
            'type' => 'success',
            'message' => 'Status Updated'
        ]);
    }

    /**
     * Delete the Status
     *
     * @param \App\Status $status
     * @return void
     */
    public function destroy(Status $status)
    {
        if ($status->students()->count() || $status->teachers()->count()) {
            return redirect()->route('user.statuses.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $status->delete();

        return redirect()->route('user.statuses.index')->with([
            'type' => 'success',
            'message' => 'Status deleted successfully'
        ]);
    }
}
