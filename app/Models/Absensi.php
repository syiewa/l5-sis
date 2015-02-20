<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model {

    //
    protected $table = 'tbl_absensi';
    protected $primaryKey = 'id_absensi';
    protected $fillable = array('id_siswa', 'id_kelas', 'absen', 'tanggal', 'bulan', 'tahun');
    public $timestamps = false;

    public function kelas() {
        return $this->belongsTo('App\Models\Kelas', 'id_kelas');
    }

    public function siswa() {
        return $this->belongsTo('App\Models\Siswa', 'id_siswa');
    }

}
