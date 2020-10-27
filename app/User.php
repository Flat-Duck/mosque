<?php

namespace App;


use App\Notifications\UserResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function teacher()
    {
        return $this->belongsTo("App\Teacher");
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
        return static::with("teacher")->paginate(10);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPassword($token, $this->email, $this->name));
    }

    /**
     * Profile update validation rules
     *
     * @return array
     **/
    public static function profileValidationRules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ];
    }

    /**
     * Password update validation rules
     *
     * @return array
     **/
    public static function passwordValidationRules()
    {
        return [
            'current_password' => 'required|string|min:4',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
    public static function validationRules($id = null)
    {
        return [
            
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins,email,'.$id,
            'password' => 'required|string',
        ];
    } 
}
