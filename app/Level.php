<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            'name' => 'required|string',
        ];
    }

    /**
     * Get the students for the Level.
     */
    public function students()
    {
        return $this->hasMany('App\Student');
    }

    /**
     * Get the exams for the Level.
     */
    public function exams()
    {
        return $this->hasMany('App\Exam');
    }

    /**
     * Get the courses for the Level.
     */
    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getList()
    {
        return static::paginate(10);
    }
}
