<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    public $primarykey = 'id';
    public $timestamp = true;

    public function hospital(){
        return $this->hasMany('App\Hospital');
    }
}
