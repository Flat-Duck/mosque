<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mosque extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'date_construction', 'street'
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
            'address' => 'required|string',
            'date_construction' => 'required|date',
            'street' => 'required|string',
        ];
    }

    /**
     * Get the rooms for the Mosque.
     */
    public function rooms()
    {
        return $this->hasMany('App\Room');
    }

    /**
     * Get the teachers for the Mosque.
     */
    public function teachers()
    {
        return $this->hasMany('App\Teacher');
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
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getList()
    {
        return static::paginate(10);
    }
}
