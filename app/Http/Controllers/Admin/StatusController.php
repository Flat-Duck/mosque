<?php

namespace App\Http\Controllers\Admin;

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

        return view('admin.statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new Status
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.statuses.add');
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

        return redirect()->route('admin.statuses.index')->with([
            'type' => 'success',
            'message' => 'تمت الاضافة بنجاح'
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
        return view('admin.statuses.edit', compact('status'));
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

        return redirect()->route('admin.statuses.index')->with([
            'type' => 'success',
            'message' => 'تم التعديل بنجاح'
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
            return redirect()->route('admin.statuses.index')->with([
                'type' => 'error',
                'message' => 'لايمكن حذف هذا السجل لانه مرتبط بعلاقات اخرى'
            ]);
        }

        $status->delete();

        return redirect()->route('admin.statuses.index')->with([
            'type' => 'success',
            'message' => 'تم الحذف بنجاح'
        ]);
    }
}
