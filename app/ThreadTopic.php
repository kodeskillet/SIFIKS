<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThreadTopic extends Model
{
    protected $table = 'thread_topics';

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
