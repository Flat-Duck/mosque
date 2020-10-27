<?php

namespace App\Http\Controllers\Admin;

use App\Teacher;
use App\Mosque;
use App\Nationality;
use App\Gender;
use App\User;
//use App\Status;
use App\Notifications\UserRegistered;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    /**
     * Display a list of Teachers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::getList();

        return view('admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new Teacher
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mosques = Mosque::all();
        $nationalities = Nationality::all();
        $genders = Gender::all();
    //    $statuses = Status::all();

        $designationOptions = Teacher::$designationOptions;

         $descriptionOptions = Teacher::$descriptionOptions;

         $certificateOptions = Teacher::$certificateOptions;


         

        return view('admin.teachers.add', compact('designationOptions', 'descriptionOptions', 'certificateOptions', 'mosques', 'nationalities', 'genders'));
    }

    /**
     * Save new Teacher
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Teacher::validationRules());

        $teacher = Teacher::create($validatedData);
      
        if($teacher->description == 2){
           $this->createUserAccount($teacher->name,$teacher->email,$teacher->id);
        }
        return redirect()->route('admin.teachers.index')->with([
            'type' => 'success',
            'message' => 'تمت الاضافة بنجاح'
        ]);
    }

    /**
     * Show the form for editing the specified Teacher
     *
     * @param \App\Teacher $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $mosques = Mosque::all();
        $nationalities = Nationality::all();
        $genders = Gender::all();
        //$statuses = Status::all();

        $designationOptions = Teacher::$designationOptions;

        $descriptionOptions = Teacher::$descriptionOptions;

        $certificateOptions = Teacher::$certificateOptions;

        return view('admin.teachers.edit', compact('teacher', 'designationOptions', 'descriptionOptions', 'certificateOptions', 'mosques', 'nationalities', 'genders'));
    }

    /**
     * Update the Teacher
     *
     * @param \App\Teacher $teacher
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Teacher $teacher)
    {
        $validatedData = request()->validate(
            Teacher::validationRules($teacher->id)
        );

          $teacher->update($validatedData);

        if($teacher->description == 2){
           $this->createUserAccount($teacher->name,$teacher->email,$teacher->id);
        }else {
             $this->deletUserAccount($teacher->email);
        }
        return redirect()->route('admin.teachers.index')->with([
            'type' => 'success',
            'message' => 'تم التعديل بنجاح'
        ]);
    }

    /**
     * Delete the Teacher
     *
     * @param \App\Teacher $teacher
     * @return void
     */
    public function destroy(Teacher $teacher)
    {
        // if ($teacher->exams()->count()) {
        //     return redirect()->route('admin.teachers.index')->with([
        //         'type' => 'error',
        //         'message' => 'لايمكن حذف هذا السجل لانه مرتبط بعلاقات اخرى'
        //     ]);
        // }

        $teacher->toggleActivation();

        return redirect()->route('admin.teachers.index')->with([
            'type' => 'success',
            'message' => 'تم الحذف بنجاح'
        ]);
    }
        public function createUserAccount($name,$email,$id){

         $user = User::where('email', $email)->first();
         if(is_null($user)){
             $user = new User();      
             $user->name = $name;
             $user->email = $email;
             $user->teacher_id = $id;
             $user->password = bcrypt('password');
             $user->save();
             $user->notify(new UserRegistered($user->teacher->mosque->name,$user->email,$user->name,"password"));
            } 
        }
        public function deletUserAccount($email)
        {
            $user = User::where('email', $email)->first();
            if(!is_null($user)){
                $user->delete();
            }}
}
