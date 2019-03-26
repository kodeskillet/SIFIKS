<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorSpecialization extends Model
{
    protected $table = 'doctor_specializations';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function trimStr($str) {
        if(strlen($str) > 50) {
            return substr($str, 0, 50)."...";
        }
        return $str;
    }
}
