<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * @var string
     */
    protected $table = 'cities';

    /**
     * @var string
     */
    public $primarykey = 'id';

    /**
     * @var bool
     */
    public $timestamp = true;

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hospital()
    {
        return $this->hasMany('App\Hospital');
    }

    public function doctor() {
        return $this->belongsTo('App\Doctor');
    }
}
