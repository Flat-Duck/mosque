<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_time', 'end_time', 'level_id','teacher_id','year','active'
    ];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            'teacher_id' => 'required|numeric|exists:teachers,id',
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s',
             'year' => 'nullable',
            // 'active' => 'required|date_format:H:i:s',
            'level_id' => 'required|numeric|exists:levels,id',
        ];
    }

    /**
     * Get the level for the Course.
     */
    public function level()
    {
        return $this->belongsTo('App\Level');
    }

        /**
     * Get the teacher for the Exam.
     */
    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }
         /**
     * Get the teachers for the Mosque.
     */
    public function toggleActivation()
    {
         $this->active = !$this->active;
         $this->save();
    }
            /**
     * Get the teacher for the Exam.
     */
    // public function students()
    // {
    //     return $this->BelongsToMany('App\Student');
    // }
    public function students()
    {
        return $this->hasMany('App\Student');// 'course_student', 'course_id', 'student_id');
    }
    /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getList()
    {
        return static::with(['level'])->paginate(10);
    }
}
