<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorSpecialization extends Model
{
    protected $table = 'doctor_specializations';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function detail() {
        return $this->hasMany('App\DoctorDetail');
    }
}
