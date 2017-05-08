<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Logic\User\CaptureIp;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'first_name', 'last_name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    // REGISTRATION VALIDATION RULES
    public static $rules = [
    'first_name'                    => 'required',
    'last_name'                     => 'required',
    'email'                         => 'required|email|unique:users',
    'password'                      => 'required|min:6|max:20',
    'password_confirmation'         => 'required|same:password'
    ];

    // REGISTRATION ERROR MESSAGES
    public static $messages = [
    'first_name.required'           => 'First Name is required',
    'last_name.required'            => 'Last Name is required',
    'email.required'                => 'Email is required',
    'email.email'                   => 'Email is invalid',
    'password.required'             => 'Password is required',
    'password.min'                  => 'Password needs to have at least 6 characters',
    'password.max'                  => 'Password maximum length is 20 characters'
    ];

    // ACCOUNT EMAIL ACTIVATION
    public function accountIsActive($code) {

        // CHECK IF ACTIVATION CODE MATCHES THE ONE WE SENT
        $user = User::where('activation_code', '=', $code)->first();
        if ($user != NULL) {

        // GET IP ADDRESS
            $userIpAddress                          = new CaptureIp;
            $user->signup_confirmation_ip_address   = $userIpAddress->getClientIp();

        // SET THE USER TO ACTIVE
            $user->active                           = 1;

        // CLEAR THE ACTIVATION CODE
            $user->activation_code                  = '';

            if ($user->role_id == 5) {
                $est = Estimacion::find($user->estimaciones[0]->id);
                $est->estado = 2;
                $est->save();
            }

        // SAVE THE USER
            if($user->save()) {
                \Auth::login($user);
            }
        }
        return true;
    }

    // USER ROLES
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function hasRole($name)
    {
        if($this->role->name == $name) return true;

        return false;
    }

    // USER PROFILES
    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }
    // public function profiles()
    // {
    //     return $this->belongsToMany('App\Models\Profile')->withTimestamps();
    // }

    public function hasProfile($name)
    {
        foreach($this->profiles as $profile)
        {
            if($profile->name == $name) return true;
        }

        return false;
    }

    public function assignProfile($profile)
    {
        return $this->profiles()->attach($profile);
    }

    public function removeProfile($profile)
    {
        return $this->profiles()->detach($profile);
    }

    public function estimaciones(){
        return $this->hasMany('App\Models\Estimacion', 'cliente');
    }

    public function a_cargo(){
        return $this->hasMany('App\Models\Estimacion', 'a_cargo');
    }

    public function logistics(){
        return $this->hasMany('App\Models\Estimacion', 'logistica');
    }
}
