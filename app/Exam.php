<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
class Exam extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'save', 'applied_rules', 'drawing', 'pronunciation', 'student_id', 'teacher_id', 'level_id','mosque_id'
    ];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            'date' => 'required|date',
            'save' => 'required|numeric',
            'applied_rules' => 'required|numeric',
            'drawing' => 'required|numeric',
            'pronunciation' => 'required|numeric',
            'student_id' => 'required|numeric|exists:students,id',
            'teacher_id' => 'required|numeric|exists:teachers,id',
            'level_id' => 'required|numeric|exists:levels,id',
            'mosque_id' => 'required|numeric|exists:mosques,id',
        ];
    }

    /**
     * Get the student for the Exam.
     */
    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    /**
     * Get the teacher for the Exam.
     */
    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

    /**
     * Get the level for the Exam.
     */
    public function level()
    {
        return $this->belongsTo('App\Level');
    }

    /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getList()
    {
        return static::where('mosque_id',Auth::user()->teacher->mosque_id)->with(['student', 'teacher', 'level'])->paginate(10);
    }
}
