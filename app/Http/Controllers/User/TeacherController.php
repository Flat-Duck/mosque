<?php

namespace App\Http\Controllers\User;

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

        return view('user.teachers.index', compact('teachers'));
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


         

        return view('user.teachers.add', compact('designationOptions', 'descriptionOptions', 'certificateOptions', 'mosques', 'nationalities', 'genders'));
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
           createUserAccount($teacher->name,$teacher->email,$teacher->id);
        }
        return redirect()->route('user.teachers.index')->with([
            'type' => 'success',
            'message' => 'Teacher added'
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

        return view('user.teachers.edit', compact('teacher', 'designationOptions', 'descriptionOptions', 'certificateOptions', 'mosques', 'nationalities', 'genders'));
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
        if($teacher->description == 2){
           createUserAccount($teacher->name,$teacher->email,$teacher->id);
        }else {
            deletUserAccount($teacher->email);
        }
        $teacher->update($validatedData);

        return redirect()->route('user.teachers.index')->with([
            'type' => 'success',
            'message' => 'Teacher Updated'
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
        //     return redirect()->route('user.teachers.index')->with([
        //         'type' => 'error',
        //         'message' => 'This record cannot be deleted as there are relationship dependencies.'
        //     ]);
        // }

        $teacher->toggleActivation();

        return redirect()->route('user.teachers.index')->with([
            'type' => 'success',
            'message' => 'Teacher deleted successfully'
        ]);
    }
    
    public function createUserAccount($name,$email,$id){
        $user = new User();      
        $user->name = $name;
        $user->email = $email;
        $user->teacher_id = $id;
        $user->password = bcrypt('password');
        $user->save();
        $user->notify(new UserRegistered($user->teacher->mosque->name,$user->email,$user->name,"password"));
        }
        public function deletUserAccount($email)
        {
            $user = User::where('email', $email)->first();
            $user->delete();
        }
    }