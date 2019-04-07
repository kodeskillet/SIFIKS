<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorSpecialization extends Model
{
    /**
     * @var string
     */
    protected $table = 'doctor_specializations';

    /**
     * @var string
     */
    public $primaryKey = 'id';

    /**
     * @var bool
     */
    public $timestamps = true;

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @param $str
     * @return string
     */
    public function trimStr($str) {
        if(strlen($str) > 15) {
            return substr($str, 0, 15)."...";
        }
        return $str;
    }
}
