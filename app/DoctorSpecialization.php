<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorSpecialization extends Model
{
    protected $table = 'doctor_specializations';
    public $primaryKey = 'id';
    public $timestamps = true;
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function trimStr($str) {
        if(strlen($str) > 15) {
            return substr($str, 0, 15)."...";
        }
        return $str;
    }
}
