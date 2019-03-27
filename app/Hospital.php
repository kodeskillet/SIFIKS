<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $table = 'hospitals';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function city(){
        return $this->belongsTo('App\City','city_id');
    }
}
