<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    public $primarykey = 'id';
    public $timestamp = true;
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function hospital(){
        return $this->hasMany('App\Hospital');
    }
}
