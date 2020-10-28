<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Student;
use Carbon\Carbon;
class AdminController extends Controller
{
    /**
     * Displays the dashboard page to the user
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('user.dashboard');
    }

    /**
     * Displays the profile page to the user
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user = Auth::guard('web')->user();

        return view('user.profile', compact('user'));
    }

    /**
     * Updates user profile details
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function profileUpdate()
    {
        $validatedData = request()->validate(User::profileValidationRules());

        $user = Auth::guard('web')->user();

        $user->update($validatedData);

        return back()->with(['type' => 'success', 'message' => 'تم تعديل الملف الشخصي بنجاح']);
    }

    /**
     * Updates user password
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function passwordUpdate()
    {
        $validatedData = request()->validate(User::passwordValidationRules());

        $user = Auth::guard('web')->user();

        if (Hash::check(request('current_password'), $user->password)) {
            $user->password = bcrypt(request('password'));
            $user->save();

            return back()->with(['type' => 'success', 'message' => 'تم تعديل كلمة المرور بنجاح']);
        }

        return back()->with(['type' => 'error', 'message' => 'كلمة المرور الحالية غير صحيحة']);
    }
}
