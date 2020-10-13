<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;

    /**
     * Static options for the Designation
     *
     * @var array
     */
    public static $designationOptions = [
        1 => 'مصنف',
        2 => 'مكافأة',
        3 => 'متطوع',
    ];

    /**
     * Static options for the Description
     *
     * @var array
     */
    public static $descriptionOptions = [
        1 => 'معلم',
        2 => 'مشرف',
        3 => 'موجه',

    ];

    /**
     * Static options for the Certificate
     *
     * @var array
     */
    public static $certificateOptions = [
        1 => 'Certificate option 1',
        2 => 'Certificate option 2',
        3 => 'Certificate option 3',
        4 => 'Certificate option 4',
        5 => 'Certificate option 5',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'date_birth', 'family_booklet_number', 'designation', 'description', 'date_designation', 'address', 'bank', 'branch', 'account', 'phone', 'email', 'certificate', 'date_certificate', 'certificate_place', 'national_number', 'mosque_id', 'nationality_id', 'gender_id'//, 'status_id'
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
            'date_birth' => 'required|date',
            'family_booklet_number' => 'required|numeric',
            'designation' => 'required|numeric',
            'description' => 'required|numeric',
            'date_designation' => 'required|date',
            'address' => 'required|string',
            'bank' => 'required|string',
            'branch' => 'required|string',
            'account' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'certificate' => 'required|numeric',
            'date_certificate' => 'required|date',
            'certificate_place' => 'required|string',
            'national_number' => 'numeric',
            'mosque_id' => 'required|numeric|exists:mosques,id',
            'nationality_id' => 'required|numeric|exists:nationalities,id',
            'gender_id' => 'required|numeric|exists:genders,id',
          //  'status_id' => 'required|numeric|exists:statuses,id',
        ];
    }

    /**
     * Returns the Designation of the order
     *
     * @return string
     */
    public function getDesignation()
    {
        return static::$designationOptions[$this->designation];
    }

    /**
     * Returns the Description of the order
     *
     * @return string
     */
    public function getDescription()
    {
        return static::$descriptionOptions[$this->description];
    }

    /**
     * Returns the Certificate of the order
     *
     * @return string
     */
    public function getCertificate()
    {
        return static::$certificateOptions[$this->certificate];
    }

    /**
     * Get the mosque for the Teacher.
     */
    public function mosque()
    {
        return $this->belongsTo('App\Mosque');
    }

    /**
     * Get the nationality for the Teacher.
     */
    public function nationality()
    {
        return $this->belongsTo('App\Nationality');
    }

    /**
     * Get the gender for the Teacher.
     */
    public function gender()
    {
        return $this->belongsTo('App\Gender');
    }

    // /**
    //  * Get the status for the Teacher.
    //  */
    // public function status()
    // {
    //     return $this->belongsTo('App\Status');
    // }

    /**
     * Get the exams for the Teacher.
     */
    public function exams()
    {
        return $this->hasMany('App\Exam');
    }
    public function user()
    {
        return $this->hasOne('App\User', 'teacher_id', 'id');
    }
    
        /**
     * Get the teachers for the Mosque.
     */
    public function toggleActivation()
    {
         $this->active = !$this->active;
         $this->save();
         if (!is_null($this->user))
         {
              $this->user->toggleActivation();
            }
    }


    /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getList()
    {
        return static::with(['mosque', 'nationality', 'gender'])->paginate(1000);
    }
}
