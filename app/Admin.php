<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'profile_picture', 'email', 'password',
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

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function article() {
        return $this->hasMany('App\Articles');
    }

    public function getGreetings() {
        $hour = Carbon::now()->format('H');

        if ($hour >= 0) {
            return "<i class='fa far fa-surprise fa-2x'></i>&nbsp;&nbsp;Wow, ini masih pagi loh ";
        } elseif ($hour >= 6) {
            return "<i class='fa far fa-smile-o fa-2x'></i>&nbsp;&nbsp;Selamat pagi ";
        } elseif ($hour >= 12) {
            return "<i class='fa far fa-smile-wink fa-2x'></i>&nbsp;&nbsp;Selamat siang ";
        } elseif ($hour >= 17) {
            return "<i class='fa far fa-grin-stars fa-2x'></i>&nbsp;&nbsp;Senja yang indah ya ";
        } elseif ($hour >= 22 ) {
            return "<i class='fa far fa-bed fa-2x'></i>&nbsp;&nbsp;Sudah malam, sebaiknya kamu istirahat ";
        }
    }
}
