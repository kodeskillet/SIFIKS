<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'threads';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function topic() {
        return $this->belongsTo('App\ThreadTopic', 'id_topic');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function doctor() {
        return $this->belongsTo('App\Doctor');
    }

    public function trimStr(string $string) {
        if(strlen($string) > 200) {
            return substr($string, 0, 200).'...';
        }
    }
}
