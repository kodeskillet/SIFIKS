<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    /**
     * @var string
     */
    protected $table = 'hospitals';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo('App\City','city_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function doctor() {
        return $this->belongsToMany('App\Doctor', 'doctor_details', 'hospital_id', 'doctor_id');
    }

    /**
     * @param $str
     * @return string
     */
    public function trimStr($str)
    {
        if(strlen($str) > 10) {
            return substr($str, 0, 10)."...";
        }
        return $str;
    }
}
