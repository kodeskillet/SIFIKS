<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    /**
     * @var string
     */
    protected $table = 'articles';

    /**
     * @var string
     */
    public $primaryKey = 'id';

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

//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
//     */
    public function admin()
    {
        return $this->belongsTo('App\Admin', 'admin_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor()
    {
        return $this->belongsTo('App\Doctor', 'doctor_id', 'id');
    }

    /**
     * @param $str
     * @return string
     */
    public function cutStr($str)
    {
        if (strlen($str) > 200){
            return substr($str,0,200) . "...";
        }
        return $str;
    }

    /**
     * @param $str
     * @return string
     */
    public function getCat($str)
    {
        switch ($str) {
            case "penyakit":    return "Penyakit";      break;
            case "obat":        return "Obat - obatan"; break;
            case "hidup-sehat": return "Hidup Sehat";   break;
            case "keluarga":    return "Keluarga";      break;
            case "kesehatan":   return "Kesehatan";     break;
        }
    }
}
