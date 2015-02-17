<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model {

    //
    protected $table = 'tbl_kepegawaian';
    protected $primaryKey = 'id_kepegawaian';
    protected $fillable = array('nip', 'nama_pegawai', 'kelahiran', 'matpel', 'jk', 'status', 'username', 'password');
    public $timestamps = false;

}
