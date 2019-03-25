<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorDetail extends Model
{
    protected $table = 'doctor_specializations';
    public $timestamps = true;

    public function doctor() {
        return $this->hasMany('App\Doctor', '');
    }

    public function specialization() {
        return $this->hasMany('App\DoctorSpecialization', 'specialization_id');
    }

}
