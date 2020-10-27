<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Mosque;
use App\Nationality;
use App\Gender;
//use App\Status;

class UserController extends Controller
{
    /**
     * Display a list of Users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::getList();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new User
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mosques = Mosque::all();
        $nationalities = Nationality::all();
        $genders = Gender::all();

        return view('admin.users.add', compact('designationOptions', 'descriptionOptions', 'certificateOptions', 'mosques', 'nationalities', 'genders'));
    }

    /**
     * Save new User
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(User::validationRules());

        $user = User::create($validatedData);

        return redirect()->route('admin.users.index')->with([
            'type' => 'success',
            'message' => 'تمت الاضافة بنجاح'
        ]);
    }

    /**
     * Show the form for editing the specified User
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $mosques = Mosque::all();
        $nationalities = Nationality::all();
        $genders = Gender::all();
        //$statuses = Status::all();

        $designationOptions = User::$designationOptions;

        $descriptionOptions = User::$descriptionOptions;

        $certificateOptions = User::$certificateOptions;

        return view('admin.users.edit', compact('teacher', 'designationOptions', 'descriptionOptions', 'certificateOptions', 'mosques', 'nationalities', 'genders'));
    }

    /**
     * Update the User
     *
     * @param \App\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $user)
    {
        $validatedData = request()->validate(
            User::validationRules($user->id)
        );

        $user->update($validatedData);

        return redirect()->route('admin.users.index')->with([
            'type' => 'success',
            'message' => 'تم التعديل بنجاح'
        ]);
    }

    /**
     * Delete the User
     *
     * @param \App\User $user
     * @return void
     */
    public function destroy(User $user)
    {
        // if ($user->exams()->count()) {
        //     return redirect()->route('admin.teachers.index')->with([
        //         'type' => 'error',
        //         'message' => 'لايمكن حذف هذا السجل لانه مرتبط بعلاقات اخرى'
        //     ]);
        // }

        $user->toggleActivation();

        return redirect()->route('admin.users.index')->with([
            'type' => 'success',
            'message' => 'تم الحذف بنجاح'
        ]);
    }
}
