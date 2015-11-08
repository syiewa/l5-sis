<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model {

    //
    protected $table = 'tbl_jawabanpoll';
    protected $primaryKey = 'id_jawaban_poll';
    protected $fillable = array('id_soal_poll', 'jawaban','counter');
    public $timestamps = false;
    
    public function polling(){
        return $this->belongsTo('App\Models\Polling','id_soal_poll');
    }

}
