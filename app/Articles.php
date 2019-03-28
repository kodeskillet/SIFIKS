<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';
    public $primaryKey = 'id';
    public $timestamps = true;
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function admin() {
        return $this->belongsTo('App\Admin', 'writer_id');
    }

    public function doctor() {
        return $this->belongsTo('App\Doctor', 'writer_id');
    }

    public function trimStr($str) {
        if(strlen($str) > 20) {
            return substr($str, 0, 20) . "...";
        }
        return $str;
    }
}
