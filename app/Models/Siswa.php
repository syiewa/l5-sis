<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model {

    //
    protected $table = 'tbl_siswa';
    protected $primaryKey = 'id_siswa';
    protected $fillable = array('nama_siswa', 'nis', 'id_kelas');
    public $timestamps = false;

    public function kelas() {
        return $this->belongsTo('App\Models\Kelas', 'id_kelas');
    }

    public function absensi() {
        return $this->hasMany('App\Models\Absensi','id_siswa');
    }

}
