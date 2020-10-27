<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
class Room extends Model
{
    use SoftDeletes;

    /**
     * Static options for the Floor
     *
     * @var array
     */
    public static $floorOptions = [
        1 => 'علوي',
        2 => 'سفلي',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'capacity', 'floor', 'mosque_id'
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
            'capacity' => 'required|numeric',
            'floor' => 'required|numeric',
            'mosque_id' => 'required|numeric|exists:mosques,id',
        ];
    }

    /**
     * Returns the Floor of the order
     *
     * @return string
     */
    public function getFloor()
    {
        return static::$floorOptions[$this->floor];
    }

    /**
     * Get the mosque for the Room.
     */
    public function mosque()
    {
        return $this->belongsTo('App\Mosque');
    }

    /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getList()
    {
        return static::where('mosque_id',Auth::user()->teacher->mosque_id)->with(['mosque'])->paginate(10);
    }
}
