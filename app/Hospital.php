<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $table = 'hospitals';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function city() {
        return $this->belongsTo('App\City','city_id');
    }

    public function trimStr($str) {
        if(strlen($str) > 10) {
            return substr($str, 0, 10)."...";
        }
        return $str;
    }
}
