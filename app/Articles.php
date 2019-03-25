<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function admin() {
        return $this->belongsTo('App\Admin', 'writer_id');
    }

    public function doctor() {
        return $this->belongsTo('App\Doctor', 'writer_id');
    }
}
