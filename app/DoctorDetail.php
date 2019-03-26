<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorDetail extends Model
{
    protected $table = 'doctor_details';
    public $timestamps = true;

    public function doctor() {
        return $this->hasMany('App\Doctor', '');
    }

    public function hospital() {
        return $this->hasMany('App\Hospital', 'specialization_id');
    }

}
