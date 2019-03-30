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

    public function cutStr($str){
        if (strlen($str) > 200){
            return substr($str,0,200) . "...";
        }
        return $str;
    }

    public function trimStr($str) {
        if(strlen($str) > 20) {
            return substr($str, 0, 20) . "...";
        }
        return $str;
    }

    public function getCat($str) {
        switch ($str) {
            case "penyakit":    return "Penyakit";      break;
            case "obat":        return "Obat - obatan"; break;
            case "hidup-sehat": return "Hidup Sehat";   break;
            case "keluarga":    return "Keluarga";      break;
            case "kesehatan":   return "Kesehatan";     break;
        }
    }
}
