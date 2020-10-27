<?php

namespace App\Http\Controllers\Admin;

use App\Mosque;
use App\Http\Controllers\Controller;

class MosqueController extends Controller
{
    /**
     * Display a list of Mosques.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mosques = Mosque::getList();

        return view('admin.mosques.index', compact('mosques'));
    }

    /**
     * Show the form for creating a new Mosque
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mosques.add');
    }

    /**
     * Save new Mosque
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Mosque::validationRules());

        $mosque = Mosque::create($validatedData);

        return redirect()->route('admin.mosques.index')->with([
            'type' => 'success',
            'message' => 'تمت الاضافة بنجاح'
        ]);
    }

    /**
     * Show the form for editing the specified Mosque
     *
     * @param \App\Mosque $mosque
     * @return \Illuminate\Http\Response
     */
    public function edit(Mosque $mosque)
    {
        return view('admin.mosques.edit', compact('mosque'));
    }

    /**
     * Update the Mosque
     *
     * @param \App\Mosque $mosque
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Mosque $mosque)
    {
        $validatedData = request()->validate(
            Mosque::validationRules($mosque->id)
        );

        $mosque->update($validatedData);

        return redirect()->route('admin.mosques.index')->with([
            'type' => 'success',
            'message' => 'تم التعديل بنجاح'
        ]);
    }

    /**
     * Delete the Mosque
     *
     * @param \App\Mosque $mosque
     * @return void
     */
    public function destroy(Mosque $mosque)
    {
        // if ($mosque->rooms()->count() || $mosque->teachers()->count()) {
        //     return redirect()->route('admin.mosques.index')->with([
        //         'type' => 'error',
        //         'message' => 'لايمكن حذف هذا السجل لانه مرتبط بعلاقات اخرى'
        //     ]);
      //  }

        $mosque->toggleActivation();

        return redirect()->route('admin.mosques.index')->with([
            'type' => 'success',
            'message' => 'تم الحذف بنجاح'
        ]);
    }
}
