<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    use Notifiable;

    protected $guard = 'doctor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'biography', 'profile_picture', 'email', 'password'
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

    public function article() {
        return $this->hasMany('App\Article');
    }

    public function detail() {
        return $this->hasMany('App\DoctorDetail');
    }

    public function specialty() {
        return $this->belongsTo('App\DoctorSpecialization', 'specialization_id');
    }

    public function trimStr($str) {
        if(strlen($str) > 20) {
            return substr($str, 0, 20)."...";
        }
        return $str;
    }
}
