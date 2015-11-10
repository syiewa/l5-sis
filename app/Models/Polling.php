<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Polling extends Model {

    //
    protected $table = 'tbl_soalpolling';
    protected $primaryKey = 'id_soal_poll';
    protected $fillable = array('soal_poll', 'status');
    public $timestamps = false;

    public function jawaban() {
        return $this->hasMany('App\Models\Jawaban','id_soal_poll');
    }

    public function scopeDropdownPoll($query) {
        $data = array();
        $eselon = $query->select(array('id_soal_poll', 'soal_poll'))->get();
        if (count($eselon) > 0) {
            foreach ($eselon as $ese) {
                $data[] = array('id' => $ese->id_soal_poll, 'label' => $ese->soal_poll);
            }
        }
        return $data;
    }

}
