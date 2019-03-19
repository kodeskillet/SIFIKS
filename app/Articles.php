<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';
    public $primaryKey = 'id';
    public $timestamps = true;
}
