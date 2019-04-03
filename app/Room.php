<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * @var string
     */
    protected $table = 'rooms';

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
}


