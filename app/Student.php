<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'national_number', 'name','enrolment_number','date_join', 'date_birth', 'address', 'phone', 'qualification', 'notes', 'passport', 'nationality_id', 'gender_id', 'status_id', 'level_id','mosque_id'
    ];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            'national_number' => 'required|numeric',
            'name' => 'required|string',
            'enrolment_number' => 'required|numeric',
            'date_birth' => 'required|date',
            'date_join' => 'required|date',
            'address' => 'required|string',
            'phone' => 'required|string',
            'qualification' => 'required|string',
            'notes' => 'required|string',
            'passport' => 'required|string',
            'nationality_id' => 'required|numeric|exists:nationalities,id',
            'gender_id' => 'required|numeric|exists:genders,id',
            'status_id' => 'required|numeric|exists:statuses,id',
            'level_id' => 'numeric|exists:levels,id',
            'mosque_id' => 'required|numeric|exists:mosques,id',
        ];
    }

    /**
     * Get the nationality for the Student.
     */
    public function nationality()
    {
        return $this->belongsTo('App\Nationality');
    }

    /**
     * Get the gender for the Student.
     */
    public function gender()
    {
        return $this->belongsTo('App\Gender');
    }

    /**
     * Get the status for the Student.
     */
    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    /**
     * Get the exams for the Student.
     */
    public function exams()
    {
        return $this->hasMany('App\Exam');
    }

    /**
     * Get the level for the Student.
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
        return static::with(['nationality', 'gender', 'status', 'level'])->paginate(10);
    }
}
