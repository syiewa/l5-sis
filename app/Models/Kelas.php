<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model {

    //
    protected $table = 'tbl_kelas';
    protected $primaryKey = 'id_kelas';
    protected $fillable = array('nama_kelas', 'tahun_ajaran');
    public $timestamps = false;

    public function siswa() {
        return $this->hasMany('App\Models\Siswa');
    }

    public function absensi() {
        return $this->hasMany('App\Models\Absensi');
    }

    public function scopeDropdownKelas($query) {
        $data = array();
        $eselon = $query->select(array('id_kelas', 'nama_kelas'))->get();
        if (count($eselon) > 0) {
            foreach ($eselon as $ese) {
                $data[] = array('id' => $ese->id_kelas, 'label' => $ese->nama_kelas);
            }
        }
        return $data;
    }

}
